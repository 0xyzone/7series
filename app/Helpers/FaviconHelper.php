<?php

namespace App\Helpers;

class FaviconHelper
{
    /**
     * Determine if current request or environment is local/development.
     */
    public static function isLocal(): bool
    {
        $host = strtolower(request()->getHost() ?? '');

        // If explicitly visiting the production domain
        if (str_contains($host, '7series.com.np')) {
            return false;
        }

        $localHosts = [
            '7series',
            'localhost',
            '127.0.0.1',
            '::1',
        ];

        if (in_array($host, $localHosts, true)) {
            return true;
        }

        if (str_ends_with($host, '.test') ||
            str_ends_with($host, '.local') ||
            str_ends_with($host, '.site') ||
            str_starts_with($host, '192.168.') ||
            str_starts_with($host, '10.') ||
            str_starts_with($host, '172.16.')
        ) {
            return true;
        }

        return ! app()->isProduction();
    }

    /**
     * Get the favicon .ico URL.
     * White for local/development; Red for production.
     */
    public static function getFaviconIcoUrl(): string
    {
        $file = static::isLocal() ? 'favicon-white.ico' : 'favicon.ico';
        $v = file_exists(public_path($file)) ? filemtime(public_path($file)) : '1';

        return asset($file).'?v='.$v;
    }

    /**
     * Get the favicon .png URL.
     * White for local/development; Red for production.
     */
    public static function getFaviconPngUrl(): string
    {
        $file = static::isLocal() ? 'favicon-white.png' : 'favicon.png';
        $v = file_exists(public_path($file)) ? filemtime(public_path($file)) : '1';

        return asset($file).'?v='.$v;
    }

    /**
     * Get the apple-touch-icon URL.
     */
    public static function getAppleTouchIconUrl(): string
    {
        $file = static::isLocal() ? 'apple-touch-icon-white.png' : 'apple-touch-icon.png';
        $v = file_exists(public_path($file)) ? filemtime(public_path($file)) : '1';

        return asset($file).'?v='.$v;
    }
}
