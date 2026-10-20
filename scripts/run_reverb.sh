#!/bin/bash

# ==============================================================================
# Laravel Reverb Manager & Watchdog - 7Series
# Supports: start | stop | restart | status | watchdog
# ==============================================================================

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
APP_DIR="$(dirname "$SCRIPT_DIR")"
LOG_FILE="$APP_DIR/storage/logs/reverb.log"
PID_FILE="$APP_DIR/storage/framework/reverb.pid"
STOP_FILE="$APP_DIR/storage/framework/reverb.stopped"

# Ensure storage directories exist
mkdir -p "$APP_DIR/storage/logs" "$APP_DIR/storage/framework"

# Find proper PHP 8.3/8.4 CLI binary on cPanel / EasyApache / VPS / Mac
PHP_BIN=""
for candidate in \
    "/usr/local/bin/ea-php84" \
    "/opt/cpanel/ea-php84/root/usr/bin/php" \
    "/usr/local/bin/ea-php83" \
    "/opt/cpanel/ea-php83/root/usr/bin/php" \
    "/usr/local/bin/ea-php82" \
    "/opt/cpanel/ea-php82/root/usr/bin/php" \
    "/usr/bin/ea-php84" \
    "/usr/bin/ea-php83" \
    "/usr/bin/ea-php82" \
    "$(command -v ea-php84 2>/dev/null)" \
    "$(command -v ea-php83 2>/dev/null)" \
    "$(command -v ea-php82 2>/dev/null)" \
    "$(command -v php 2>/dev/null)" \
    "php"
do
    if [ -n "$candidate" ] && ([ -x "$candidate" ] || command -v "$candidate" >/dev/null 2>&1); then
        # Ensure binary is CLI and PHP >= 8.2 (80200)
        PHP_VER=$("$candidate" -r 'echo PHP_VERSION_ID;' 2>/dev/null || echo 0)
        PHP_SAPI=$("$candidate" -r 'echo PHP_SAPI;' 2>/dev/null || echo "")
        if [ "$PHP_VER" -ge 80200 ] && [ "$PHP_SAPI" = "cli" ]; then
            PHP_BIN="$candidate"
            break
        fi
    fi
done

if [ -z "$PHP_BIN" ]; then
    # Fallback without strict SAPI check if needed
    for candidate in "/usr/local/bin/ea-php84" "/usr/local/bin/ea-php83" "ea-php84" "ea-php83" "php"; do
        if command -v "$candidate" >/dev/null 2>&1 || [ -x "$candidate" ]; then
            PHP_BIN="$candidate"
            break
        fi
    done
fi

ACTION="${1:-watchdog}"

case "$ACTION" in
    stop)
        touch "$STOP_FILE"
        # 1. Gracefully terminate via PID file
        if [ -f "$PID_FILE" ]; then
            SAVED_PID=$(cat "$PID_FILE" 2>/dev/null)
            if [ -n "$SAVED_PID" ] && kill -0 "$SAVED_PID" 2>/dev/null; then
                kill -15 "$SAVED_PID" 2>/dev/null
            fi
            rm -f "$PID_FILE"
        fi

        # 2. Gracefully terminate any reverb:start processes
        pkill -15 -f 'reverb:start' 2>/dev/null

        # 3. Allow up to 3.5 seconds for Reverb to gracefully flush and terminate connections
        STOPPED=0
        for i in {1..18}; do
            if ! pgrep -f 'reverb:start' >/dev/null 2>&1; then
                STOPPED=1
                break
            fi
            sleep 0.2
        done

        # 4. If still hanging after 3.5s, force kill
        if [ "$STOPPED" -eq 0 ]; then
            pkill -9 -f 'reverb:start' 2>/dev/null
            fuser -k -9 8080/tcp >/dev/null 2>&1
            sleep 0.2
        fi

        rm -f "$PID_FILE"
        echo "stopped"
        exit 0
        ;;

    start)
        rm -f "$STOP_FILE"

        # Check if already running
        if pgrep -f 'reverb:start' >/dev/null 2>&1; then
            echo "already_running"
            exit 0
        fi

        if [ -z "$PHP_BIN" ]; then
            echo "[$(date '+%Y-%m-%d %H:%M:%S')] ERROR: Could not find PHP >= 8.2 CLI binary." >> "$LOG_FILE"
            echo "error:no_php_cli"
            exit 1
        fi

        cd "$APP_DIR" || exit 1
        nohup "$PHP_BIN" "$APP_DIR/artisan" reverb:start --host=0.0.0.0 --port=8080 >> "$LOG_FILE" 2>&1 &
        NEW_PID=$!
        echo "$NEW_PID" > "$PID_FILE"

        # Wait up to 3 seconds for it to bind and start
        STARTED=0
        for i in {1..15}; do
            if pgrep -f 'reverb:start' >/dev/null 2>&1; then
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
        if pgrep -f 'reverb:start' >/dev/null 2>&1; then
            echo "running"
            exit 0
        else
            echo "stopped"
            exit 1
        fi
        ;;

    watchdog|*)
        # Don't auto-start if user intentionally stopped Reverb from dashboard
        if [ -f "$STOP_FILE" ]; then
            exit 0
        fi

        # Don't start if already running
        if pgrep -f 'reverb:start' >/dev/null 2>&1; then
            exit 0
        fi

        if [ -z "$PHP_BIN" ]; then
            exit 1
        fi

        cd "$APP_DIR" || exit 1
        nohup "$PHP_BIN" "$APP_DIR/artisan" reverb:start --host=0.0.0.0 --port=8080 >> "$LOG_FILE" 2>&1 &
        echo $! > "$PID_FILE"
        ;;
esac
