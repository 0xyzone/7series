<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('retail_stores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('store_type')->default('official_store'); // flagship, official_store, authorized_retailer, wholesale_hub
            $table->string('city');
            $table->string('address');
            $table->string('landmark')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('operating_hours')->nullable()->default('10:00 AM – 8:00 PM');
            $table->text('google_maps_url')->nullable();
            $table->string('image')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retail_stores');
    }
};
