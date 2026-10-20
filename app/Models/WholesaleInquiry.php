<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WholesaleInquiry extends Model
{
    protected $fillable = [
        'company_name',
        'contact_name',
        'email',
        'phone',
        'business_type',
        'target_volume',
        'product_series',
        'sample_requested',
        'notes',
        'status',
    ];
}
