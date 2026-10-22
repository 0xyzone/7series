<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RetailStore extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'store_type',
        'city',
        'address',
        'landmark',
        'phone',
        'email',
        'operating_hours',
        'google_maps_url',
        'latitude',
        'longitude',
        'image',
        'featured',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
        'featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected $appends = [
        'image_url',
    ];

    public static function getDefaultCityCoordinates(?string $city): array
    {
        $city = strtolower(trim((string) $city));
        $map = [
            'kathmandu' => ['lat' => 27.7042, 'lng' => 85.3130],
            'lalitpur' => ['lat' => 27.6788, 'lng' => 85.3135],
            'bhaktapur' => ['lat' => 27.6710, 'lng' => 85.4298],
            'pokhara' => ['lat' => 28.2096, 'lng' => 83.9592],
            'butwal' => ['lat' => 27.7006, 'lng' => 83.4658],
            'biratnagar' => ['lat' => 26.4525, 'lng' => 87.2718],
            'dharan' => ['lat' => 26.8124, 'lng' => 87.2835],
            'narayangarh' => ['lat' => 27.6937, 'lng' => 84.4333],
            'nepalgunj' => ['lat' => 28.0500, 'lng' => 81.6167],
            'itahari' => ['lat' => 26.6667, 'lng' => 87.2833],
            'hetauda' => ['lat' => 27.4285, 'lng' => 85.0322],
            'birgunj' => ['lat' => 27.0137, 'lng' => 84.8770],
            'birtamode' => ['lat' => 26.6347, 'lng' => 87.9867],
            'dhangadhi' => ['lat' => 28.6944, 'lng' => 80.5978],
            'janakpur' => ['lat' => 26.7288, 'lng' => 85.9244],
            'bhairahawa' => ['lat' => 27.5042, 'lng' => 83.4503],
        ];

        return $map[$city] ?? ['lat' => 27.7125, 'lng' => 85.3100];
    }

    public function getLatitudeAttribute($value): ?float
    {
        if ($value !== null && $value !== '') {
            return (float) $value;
        }
        return self::getDefaultCityCoordinates($this->city)['lat'] ?? 27.7125;
    }

    public function getLongitudeAttribute($value): ?float
    {
        if ($value !== null && $value !== '') {
            return (float) $value;
        }
        return self::getDefaultCityCoordinates($this->city)['lng'] ?? 85.3100;
    }

    public function getImageUrlAttribute(): ?string
    {
        if (empty($this->image)) {
            return null;
        }
        if (str_starts_with($this->image, 'http') || str_starts_with($this->image, 'images/')) {
            return asset($this->image);
        }
        return asset('storage/' . $this->image);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($store) {
            if (empty($store->slug)) {
                $store->slug = Str::slug($store->name.'-'.$store->city);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order')->orderBy('featured', 'desc');
    }
}
