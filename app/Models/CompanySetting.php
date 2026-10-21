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
        'primary_email',
        'email_note',
        'primary_phone',
        'whatsapp_number',
        'operating_hours',
        'operating_hours_note',
        'map_pins',
    ];

    protected $casts = [
        'map_pins' => 'array',
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
                'google_maps_url' => 'https://maps.google.com/?q=Padma+Colony+Sitapaila+Kathmandu',
                'primary_email' => 'samparka@7series.com.np',
                'email_note' => 'For line sheets, volume pricing, and customer inquiries.',
                'primary_phone' => '+977 9801234567',
                'whatsapp_number' => '+977 9801234567',
                'operating_hours' => 'Sunday – Friday: 09:00 – 18:00',
                'operating_hours_note' => 'Saturday: Factory Closed (Machinery Maintenance & Dispatch Prep)',
                'map_pins' => [
                    [
                        'title' => 'Sitapaila Main Manufacturing Plant',
                        'type' => 'Factory & Production Line',
                        'latitude' => 27.7125,
                        'longitude' => 85.2850,
                        'address' => 'Near Padma Colony Main Gate, Sitapaila, Kathmandu',
                        'phone' => '+977 9801234567',
                        'google_maps_url' => 'https://maps.google.com/?q=27.7125,85.2850',
                        'is_primary' => true,
                    ],
                    [
                        'title' => 'Kathmandu Corporate & B2B Showroom',
                        'type' => 'B2B Wholesale & Sample Desk',
                        'latitude' => 27.7058,
                        'longitude' => 85.3280,
                        'address' => 'New Road / Durbarmarg Trade Axis, Kathmandu',
                        'phone' => '+977 9801234568',
                        'google_maps_url' => 'https://maps.google.com/?q=27.7058,85.3280',
                        'is_primary' => false,
                    ],
                ],
            ]);
        }

        return $setting;
    }
}
