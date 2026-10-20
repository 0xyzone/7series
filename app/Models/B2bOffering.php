<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class B2bOffering extends Model
{
    protected $fillable = [
        'title',
        'category',
        'fabric_spec',
        'moq',
        'fob_price_range',
        'turnaround_time',
        'description',
        'image',
        'sort_order',
        'is_active',
    ];
}
