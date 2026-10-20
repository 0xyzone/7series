#!/bin/bash

# ==============================================================================
# WhatsApp Baileys Gateway Manager & Watchdog - 7Series
# Supports: start | stop | restart | status
# ==============================================================================

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
APP_DIR="$(dirname "$SCRIPT_DIR")"
WA_DIR="$APP_DIR/whatsapp-gateway"
LOG_FILE="$APP_DIR/storage/logs/whatsapp-gateway.log"
PID_FILE="$APP_DIR/storage/framework/whatsapp.pid"

mkdir -p "$APP_DIR/storage/logs" "$APP_DIR/storage/framework"

# 1. Resolve Node.js binary across cPanel / EasyApache / VPS / Mac
NODE_BIN=""
for candidate in \
    "/usr/local/bin/node" \
    "/usr/bin/node" \
    "/opt/cpanel/ea-nodejs22/bin/node" \
    "/opt/cpanel/ea-nodejs20/bin/node" \
    "/opt/cpanel/ea-nodejs18/bin/node" \
    "$(command -v node 2>/dev/null)" \
    "node"
do
    if [ -n "$candidate" ] && ([ -x "$candidate" ] || command -v "$candidate" >/dev/null 2>&1); then
        NODE_BIN="$candidate"
        break
    fi
done

# Check cPanel virtualenv paths if user home exists
if [ -z "$NODE_BIN" ]; then
    USER_NAME="$(whoami 2>/dev/null)"
    for ver in 24 22 20 18 16; do
        candidate="/home/$USER_NAME/nodevenv/public_html/7series/$ver/bin/node"
        if [ -x "$candidate" ]; then
            NODE_BIN="$candidate"
            break
        fi
    done
fi

ACTION="${1:-status}"

case "$ACTION" in
    stop)
        # 1. Kill saved PID
        if [ -f "$PID_FILE" ]; then
            SAVED_PID=$(cat "$PID_FILE" 2>/dev/null)
            if [ -n "$SAVED_PID" ] && kill -0 "$SAVED_PID" 2>/dev/null; then
                kill -15 "$SAVED_PID" 2>/dev/null
            fi
            rm -f "$PID_FILE"
        fi

        # 2. Kill by process keyword
        pkill -15 -f 'whatsapp-gateway/server.js' 2>/dev/null
        pkill -15 -f 'whatsapp-gateway' 2>/dev/null

        # 3. Poll for port 3000 to release
        for i in {1..12}; do
            if ! fuser 3000/tcp >/dev/null 2>&1 && ! pgrep -f 'whatsapp-gateway' >/dev/null 2>&1; then
                break
            fi
            sleep 0.2
        done

        # 4. Force kill if still holding port 3000
        fuser -k -9 3000/tcp >/dev/null 2>&1
        pkill -9 -f 'whatsapp-gateway' 2>/dev/null
        rm -f "$PID_FILE"
        echo "stopped"
        exit 0
        ;;

    start)
        # Check if port 3000 is already active
        if curl -s http://127.0.0.1:3000/status >/dev/null 2>&1; then
            echo "already_running"
            exit 0
        fi

        if [ -z "$NODE_BIN" ]; then
            echo "[$(date '+%Y-%m-%d %H:%M:%S')] ERROR: Node.js executable not found." >> "$LOG_FILE"
            echo "error:no_node"
            exit 1
        fi

        # Ensure node_modules exists, otherwise try npm install
        if [ ! -d "$WA_DIR/node_modules" ] && [ ! -d "$APP_DIR/node_modules/@whiskeysockets" ]; then
            NPM_BIN="$(dirname "$NODE_BIN")/npm"
            if [ ! -x "$NPM_BIN" ]; then
                NPM_BIN="$(command -v npm 2>/dev/null)"
            fi
            if [ -n "$NPM_BIN" ] && [ -x "$NPM_BIN" ]; then
                echo "[$(date '+%Y-%m-%d %H:%M:%S')] Installing missing whatsapp-gateway dependencies..." >> "$LOG_FILE"
                cd "$WA_DIR" && "$NPM_BIN" install --omit=dev >> "$LOG_FILE" 2>&1
            fi
        fi

        cd "$WA_DIR" || exit 1
        export NODE_PATH="$WA_DIR/node_modules:$APP_DIR/node_modules"
        nohup "$NODE_BIN" "$WA_DIR/server.js" >> "$LOG_FILE" 2>&1 &
        NEW_PID=$!
        echo "$NEW_PID" > "$PID_FILE"

        # Poll for WhatsApp to respond on port 3000 (up to 4.5 seconds)
        STARTED=0
        for i in {1..22}; do
            if curl -s http://127.0.0.1:3000/status >/dev/null 2>&1; then
                STARTED=1
                break
            fi
            sleep 0.2
        done

        if [ "$STARTED" -eq 1 ]; then
            echo "started"
            exit 0
        else
            echo "failed"
            exit 1
        fi
        ;;

    restart)
        "$0" stop
        sleep 0.8
        "$0" start
        ;;

    status)
        if curl -s http://127.0.0.1:3000/status >/dev/null 2>&1; then
            echo "running"
            exit 0
        else
            echo "stopped"
            exit 1
        fi
        ;;
esac
