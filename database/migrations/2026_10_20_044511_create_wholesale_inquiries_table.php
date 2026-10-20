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
        Schema::create('wholesale_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('contact_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('business_type')->nullable(); // Wholesaler, Retailer, Brand, Distributor
            $table->string('target_volume')->nullable(); // e.g. 250-999, 1000-4999, 5000+
            $table->string('product_series')->nullable(); // Denim, Trousers, Outerwear, Knitwear, Custom OEM
            $table->boolean('sample_requested')->default(false);
            $table->text('notes')->nullable();
            $table->string('status')->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wholesale_inquiries');
    }
};
