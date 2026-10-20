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
        Schema::create('b2b_offerings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category')->default('Denim');
            $table->string('fabric_spec')->nullable();
            $table->string('moq')->default('250 units');
            $table->string('fob_price_range')->nullable();
            $table->string('turnaround_time')->default('14-21 days');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('b2b_offerings');
    }
};
