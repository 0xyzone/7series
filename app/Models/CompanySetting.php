<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanySetting extends Model
{
    protected $table = 'company_settings';

    protected $fillable = [
        'company_name',
        'tagline',
        'primary_address',
        'city',
        'state',
        'directions_note',
        'google_maps_url',
        'google_review_url',
        'google_place_id',
        'google_reviews_widget_code',
        'google_maps_api_key',
        'primary_email',
        'email_note',
        'primary_phone',
        'whatsapp_number',
        'operating_hours',
        'operating_hours_note',
        'social_links',
        'linktree_url',
        'linktree_qr_path',
        'map_pins',
    ];

    protected $casts = [
        'map_pins' => 'array',
        'social_links' => 'array',
    ];

    /**
     * Singleton accessor: get the company settings record or create default record.
     */
    public static function getSettings(): self
    {
        $setting = self::first();

        if (! $setting) {
            $setting = self::create([
                'company_name' => 'Seven Series Garment Industry',
                'tagline' => 'Authentic Denim Clothing Brand & Garment Factory',
                'primary_address' => 'Near Padma Colony Main Entrance, Sitapaila',
                'city' => 'Kathmandu',
                'state' => 'Bagmati Province, Nepal',
                'directions_note' => 'Easily accessible from Sitapaila Chowk, Ring Road. Direct freight and loading bay available.',
                'google_maps_url' => 'https://www.google.com/maps/dir/?api=1&destination=27.7125,85.2850',
                'google_review_url' => 'https://g.page/r/CWwuPiVj3QleEBM/review',
                'google_place_id' => 'ChIJtSIuawAj6zkRbC4-JWPdCV4',
                'google_reviews_widget_code' => null,
                'primary_email' => 'samparka@7series.com.np',
                'email_note' => 'For line sheets, volume pricing, and customer inquiries.',
                'primary_phone' => '+977 9801234567',
                'whatsapp_number' => '+977 9801234567',
                'operating_hours' => 'Sunday – Friday: 09:00 – 18:00',
                'operating_hours_note' => 'Saturday: Factory Closed (Machinery Maintenance & Dispatch Prep)',
                'linktree_url' => 'https://linktr.ee/sevenseries',
                'linktree_qr_path' => 'images/sevenseries linktree.svg',
                'social_links' => [
                    [
                        'platform' => 'Instagram',
                        'url' => 'https://instagram.com/sevenseries.np',
                        'handle' => '@sevenseries.np',
                        'label' => 'Official Brand Feed',
                        'is_active' => true,
                    ],
                    [
                        'platform' => 'Facebook',
                        'url' => 'https://facebook.com/sevenseriesnp',
                        'handle' => 'Seven Series Official',
                        'label' => 'Announcements & Community',
                        'is_active' => true,
                    ],
                    [
                        'platform' => 'TikTok',
                        'url' => 'https://tiktok.com/@sevenseries',
                        'handle' => '@sevenseries',
                        'label' => 'Behind The Seams & Factory Clips',
                        'is_active' => true,
                    ],
                    [
                        'platform' => 'YouTube',
                        'url' => 'https://youtube.com/@sevenseries',
                        'handle' => 'Seven Series Denim',
                        'label' => 'Denim Weaving & Craft Videos',
                        'is_active' => true,
                    ],
                ],
                'map_pins' => [
                    [
                        'title' => 'Sitapaila Main Manufacturing Plant',
                        'type' => 'Factory & Production Line',
                        'latitude' => 27.7125,
                        'longitude' => 85.2850,
                        'address' => 'Near Padma Colony Main Gate, Sitapaila, Kathmandu',
                        'phone' => '+977 9801234567',
                        'google_maps_url' => 'https://www.google.com/maps/dir/?api=1&destination=27.7125,85.2850',
                        'is_primary' => true,
                    ],
                    [
                        'title' => 'Kathmandu Corporate & B2B Showroom',
                        'type' => 'B2B Wholesale & Sample Desk',
                        'latitude' => 27.7058,
                        'longitude' => 85.3280,
                        'address' => 'New Road / Durbarmarg Trade Axis, Kathmandu',
                        'phone' => '+977 9801234568',
                        'google_maps_url' => 'https://www.google.com/maps/dir/?api=1&destination=27.7058,85.3280',
                        'is_primary' => false,
                    ],
                ],
            ]);
        } else {
            // Ensure linktree defaults if currently empty
            if (empty($setting->linktree_url)) {
                $setting->linktree_url = 'https://linktr.ee/sevenseries';
            }
            if (empty($setting->linktree_qr_path)) {
                $setting->linktree_qr_path = 'images/sevenseries linktree.svg';
            }
            if (empty($setting->social_links)) {
                $setting->social_links = [
                    [
                        'platform' => 'Instagram',
                        'url' => 'https://instagram.com/sevenseries.np',
                        'handle' => '@sevenseries.np',
                        'label' => 'Official Brand Feed',
                        'is_active' => true,
                    ],
                    [
                        'platform' => 'Facebook',
                        'url' => 'https://facebook.com/sevenseriesnp',
                        'handle' => 'Seven Series Official',
                        'label' => 'Announcements & Community',
                        'is_active' => true,
                    ],
                    [
                        'platform' => 'TikTok',
                        'url' => 'https://tiktok.com/@sevenseries',
                        'handle' => '@sevenseries',
                        'label' => 'Behind The Seams & Factory Clips',
                        'is_active' => true,
                    ],
                    [
                        'platform' => 'YouTube',
                        'url' => 'https://youtube.com/@sevenseries',
                        'handle' => 'Seven Series Denim',
                        'label' => 'Denim Weaving & Craft Videos',
                        'is_active' => true,
                    ],
                ];
                $setting->saveQuietly();
            }
        }

        return $setting;
    }

    /**
     * Generate 100% Free Map Embed URL without any Google API keys or billing restrictions.
     */
    public function getGoogleMapsEmbedUrl(?int $pinIndex = null): string
    {
        // If custom embed iframe or embed url is explicitly provided in settings
        if (!empty($this->google_maps_url)) {
            if (preg_match('/src="([^"]+)"/', $this->google_maps_url, $matches)) {
                return $matches[1];
            }
            if (str_contains($this->google_maps_url, 'output=embed') || str_contains($this->google_maps_url, 'google.com/maps/embed') || str_contains($this->google_maps_url, 'openstreetmap.org')) {
                return $this->google_maps_url;
            }
        }

        $lat = 27.7125;
        $lng = 85.2850;

        // If a specific pin is selected
        if ($pinIndex !== null && !empty($this->map_pins[$pinIndex])) {
            $pin = $this->map_pins[$pinIndex];
            if (!empty($pin['latitude']) && !empty($pin['longitude'])) {
                $lat = (float) $pin['latitude'];
                $lng = (float) $pin['longitude'];
            }
        } elseif (!empty($this->map_pins) && is_array($this->map_pins)) {
            foreach ($this->map_pins as $pin) {
                if (!empty($pin['is_primary']) && !empty($pin['latitude']) && !empty($pin['longitude'])) {
                    $lat = (float) $pin['latitude'];
                    $lng = (float) $pin['longitude'];
                    break;
                }
            }
        }

        $minLng = round($lng - 0.012, 5);
        $minLat = round($lat - 0.008, 5);
        $maxLng = round($lng + 0.012, 5);
        $maxLat = round($lat + 0.008, 5);

        return "https://www.openstreetmap.org/export/embed.html?bbox={$minLng}%2C{$minLat}%2C{$maxLng}%2C{$maxLat}&layer=mapnik&marker={$lat}%2C{$lng}";
    }
}
