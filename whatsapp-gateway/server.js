import express from 'express';
import { fileURLToPath } from 'url';
import path from 'path';
import fs from 'fs';
import pino from 'pino';
import QRCode from 'qrcode';
import qrcodeTerminal from 'qrcode-terminal';
import {
    makeWASocket,
    DisconnectReason,
    useMultiFileAuthState,
    fetchLatestBaileysVersion
} from '@whiskeysockets/baileys';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const PORT = process.env.PORT || 3000;
const app = express();
app.use(express.json());

let sock = null;
let connectionStatus = 'initializing';
let latestQR = null;
let latestQRDataUrl = null;
let connectedUser = null;

const logger = pino({ level: 'silent' });

async function connectToWhatsApp() {
    connectionStatus = 'connecting';
    const authDir = path.join(__dirname, 'auth_info');
    if (!fs.existsSync(authDir)) {
        fs.mkdirSync(authDir, { recursive: true });
    }

    const { state, saveCreds } = await useMultiFileAuthState(authDir);

    let version = [2, 3000, 1015901307];
    try {
        const v = await fetchLatestBaileysVersion();
        if (v?.version) version = v.version;
    } catch (e) {
        console.log('[WhatsApp] Using fallback Baileys version');
    }

    sock = makeWASocket({
        version,
        auth: state,
        logger,
        printQRInTerminal: false,
        browser: ['7Series Factory', 'Chrome', '1.0.0']
    });

    sock.ev.on('connection.update', async (update) => {
        const { connection, lastDisconnect, qr } = update;

        if (qr) {
            latestQR = qr;
            try {
                latestQRDataUrl = await QRCode.toDataURL(qr, { scale: 8, margin: 2 });
            } catch (err) {
                console.error('[WhatsApp] Failed to generate QR data URL:', err);
            }
            console.log('\n=========================================');
            console.log('  7SERIES WHATSAPP GATEWAY - PAIRING QR  ');
            console.log('=========================================');
            qrcodeTerminal.generate(qr, { small: true });
        }

        if (connection === 'close') {
            const statusCode = lastDisconnect?.error?.output?.statusCode;
            const shouldReconnect = statusCode !== DisconnectReason.loggedOut;
            connectionStatus = 'disconnected';
            latestQR = null;
            latestQRDataUrl = null;
            connectedUser = null;

            console.log(`[WhatsApp] Connection closed (code: ${statusCode}). Reconnecting: ${shouldReconnect}`);

            if (shouldReconnect) {
                setTimeout(connectToWhatsApp, 3000);
            } else {
                console.log('[WhatsApp] Session logged out. Please restart and scan a new QR code.');
            }
        } else if (connection === 'open') {
            connectionStatus = 'connected';
            latestQR = null;
            latestQRDataUrl = null;
            connectedUser = sock?.user?.id ? sock.user.id.split(':')[0] : 'Connected';
            console.log(`\n✅ [WhatsApp] Connected successfully! Logged in as: ${connectedUser}\n`);
        }
    });

    sock.ev.on('creds.update', saveCreds);
}

// Format phone number to WhatsApp JID
function formatJid(phone) {
    if (!phone) return null;
    let clean = phone.toString().replace(/[^0-9]/g, '');

    // If starts with 0 and 11 digits (e.g. 09800000000)
    if (clean.startsWith('0') && clean.length === 11) {
        clean = clean.substring(1);
    }

    // Nepal mobile (10 digits starting with 98 or 97) -> prefix 977
    if (clean.length === 10 && (clean.startsWith('98') || clean.startsWith('97'))) {
        clean = '977' + clean;
    }

    return `${clean}@s.whatsapp.net`;
}

// Core routes router
const router = express.Router();

router.get('/', (req, res) => {
    res.redirect('qr');
});

router.get('/status', (req, res) => {
    res.json({
        success: true,
        status: connectionStatus,
        user: connectedUser,
        has_qr: !!latestQRDataUrl
    });
});

router.get('/qr', (req, res) => {
    const isConnected = connectionStatus === 'connected';

    const html = `
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>7Series WhatsApp Gateway</title>
        ${!isConnected ? '<meta http-equiv="refresh" content="5">' : ''}
        <style>
            * { box-sizing: border-box; margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; }
            body { background: #0b0f19; color: #f8fafc; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 24px; }
            .card { background: #111827; border: 1px solid #1f2937; border-radius: 16px; padding: 32px; max-width: 440px; width: 100%; text-align: center; box-shadow: 0 20px 40px rgba(0,0,0,0.5); }
            .badge { display: inline-flex; align-items: center; gap: 6px; padding: 6px 14px; border-radius: 9999px; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 20px; }
            .badge-connected { background: rgba(16, 185, 129, 0.15); color: #10b981; border: 1px solid rgba(16, 185, 129, 0.3); }
            .badge-waiting { background: rgba(245, 158, 11, 0.15); color: #f59e0b; border: 1px solid rgba(245, 158, 11, 0.3); }
            .badge-dot { width: 8px; height: 8px; border-radius: 50%; background: currentColor; }
            h1 { font-size: 22px; font-weight: 800; letter-spacing: -0.02em; margin-bottom: 8px; color: #ffffff; }
            p { font-size: 14px; color: #9ca3af; line-height: 1.5; margin-bottom: 24px; }
            .qr-box { background: #ffffff; padding: 16px; border-radius: 12px; display: inline-block; box-shadow: 0 8px 16px rgba(0,0,0,0.3); margin-bottom: 24px; }
            .qr-box img { display: block; width: 240px; height: 240px; }
            .instructions { text-align: left; background: #1e293b; border-radius: 10px; padding: 16px; font-size: 13px; color: #cbd5e1; }
            .instructions ol { padding-left: 20px; line-height: 1.8; }
            .connected-box { background: rgba(16, 185, 129, 0.08); border: 1px solid rgba(16, 185, 129, 0.2); border-radius: 12px; padding: 24px; margin-bottom: 20px; }
            .connected-icon { font-size: 48px; margin-bottom: 12px; }
        </style>
    </head>
    <body>
        <div class="card">
            ${isConnected ? `
                <div class="badge badge-connected"><span class="badge-dot"></span> Active & Ready</div>
                <div class="connected-box">
                    <div class="connected-icon">✅</div>
                    <h1>WhatsApp Connected</h1>
                    <p style="margin-bottom:0; color:#cbd5e1;">Logged in as: <strong>+${connectedUser}</strong></p>
                </div>
                <p>Background server notifications are fully active. Automated messages will be dispatched instantly upon customer inquiry.</p>
            ` : `
                <div class="badge badge-waiting"><span class="badge-dot"></span> Waiting for QR Scan</div>
                <h1>Pair 7Series WhatsApp</h1>
                <p>Scan this QR code with WhatsApp on your phone to link your business or staff number.</p>
                
                ${latestQRDataUrl ? `
                    <div class="qr-box">
                        <img src="${latestQRDataUrl}" alt="WhatsApp Pairing QR Code" />
                    </div>
                ` : `
                    <div style="padding: 40px; color: #9ca3af; font-size: 14px;">
                        Generating secure QR code... (page auto-refreshes every 5s)
                    </div>
                `}

                <div class="instructions">
                    <strong>How to link:</strong>
                    <ol>
                        <li>Open <strong>WhatsApp</strong> on your phone</li>
                        <li>Tap <strong>Settings / ⋮ Menu</strong> > <strong>Linked Devices</strong></li>
                        <li>Tap <strong>Link a Device</strong> and point camera here</li>
                    </ol>
                </div>
            `}
        </div>
    </body>
    </html>
    `;
    res.send(html);
});

router.post('/send-message', async (req, res) => {
    try {
        const { phone, message } = req.body;

        if (!phone || !message) {
            return res.status(400).json({
                success: false,
                error: 'Missing required parameters: "phone" and "message"'
            });
        }

        if (connectionStatus !== 'connected' || !sock) {
            return res.status(503).json({
                success: false,
                error: 'WhatsApp Gateway not connected. Please scan QR at the /qr page.',
                status: connectionStatus
            });
        }

        const jid = formatJid(phone);
        if (!jid) {
            return res.status(400).json({
                success: false,
                error: 'Invalid phone number format'
            });
        }

        console.log(`[WhatsApp Gateway] Dispatching automated message to ${jid}...`);

        const result = await sock.sendMessage(jid, { text: message });

        return res.json({
            success: true,
            recipient: jid,
            messageId: result?.key?.id
        });
    } catch (error) {
        console.error('[WhatsApp Gateway Error]', error);
        return res.status(500).json({
            success: false,
            error: error.message || 'Failed to send WhatsApp message'
        });
    }
});

// Mount router on root and common subpaths for Phusion Passenger compatibility
app.use('/', router);
app.use('/whatsapp', router);

// Start the server
app.listen(PORT, () => {
    console.log(`================================================`);
    console.log(`  7Series WhatsApp Gateway running on port ${PORT}`);
    console.log(`================================================`);
    connectToWhatsApp().catch(err => console.error('[WhatsApp Init Error]', err));
});
