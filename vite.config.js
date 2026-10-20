import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';
import fs from 'node:fs';

const possibleSslPaths = [
    {
        key: '/Applications/MAMP/conf/apache/ssl/7series.key',
        cert: '/Applications/MAMP/conf/apache/ssl/7series.crt',
    },
    {
        key: 'D:/wamp64/bin/apache/apache2.4.65/conf/ssl/7series.key',
        cert: 'D:/wamp64/bin/apache/apache2.4.65/conf/ssl/7series.crt',
    },
    {
        key: 'C:/wamp64/bin/apache/apache2.4.65/conf/ssl/7series.key',
        cert: 'C:/wamp64/bin/apache/apache2.4.65/conf/ssl/7series.crt',
    },
];

const activeSsl = possibleSslPaths.find(
    (p) => fs.existsSync(p.key) && fs.existsSync(p.cert)
);

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: '7series',
        cors: true,
        https: activeSsl
            ? {
                  key: fs.readFileSync(activeSsl.key),
                  cert: fs.readFileSync(activeSsl.cert),
              }
            : false,
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
