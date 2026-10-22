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
            refresh: [
                'app/Filament/**',
                'app/Http/**',
                'app/Livewire/**',
                'app/Models/**',
                'app/Providers/**',
                'app/Services/**',
                'resources/views/**',
                'resources/css/**',
                'resources/js/**',
                'public/css/**',
                'public/js/**',
                'routes/**',
            ],
        }),
        tailwindcss(),
    ],
    server: {
        host: '0.0.0.0',
        cors: true,
        hmr: {
            host: '7series',
        },
        https: activeSsl
            ? {
                  key: fs.readFileSync(activeSsl.key),
                  cert: fs.readFileSync(activeSsl.cert),
              }
            : false,
        watch: {
            usePolling: true,
            interval: 500,
            ignored: ['**/storage/framework/views/**', '**/node_modules/**'],
        },
    },
});
