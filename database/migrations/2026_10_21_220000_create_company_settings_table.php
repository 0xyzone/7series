<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('company_settings', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->default('Seven Series Garment Industry');
            $table->string('tagline')->default('Authentic Denim Clothing Brand & Garment Factory');
            $table->text('primary_address')->nullable();
            $table->string('city')->default('Kathmandu');
            $table->string('state')->default('Bagmati Province, Nepal');
            $table->text('directions_note')->nullable();
            $table->text('google_maps_url')->nullable();
            $table->string('primary_email')->default('samparka@7series.com.np');
            $table->text('email_note')->nullable();
            $table->string('primary_phone')->default('+977 9801234567');
            $table->string('whatsapp_number')->default('+977 9801234567');
            $table->string('operating_hours')->default('Sunday – Friday: 09:00 – 18:00');
            $table->string('operating_hours_note')->default('Saturday: Factory Closed (Machinery Maintenance & Dispatch Prep)');
            $table->json('map_pins')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_settings');
    }
};
