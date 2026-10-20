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
        'image',
        'featured',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

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
