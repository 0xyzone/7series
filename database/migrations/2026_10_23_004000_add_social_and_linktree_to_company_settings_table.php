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
        Schema::table('company_settings', function (Blueprint $table) {
            $table->json('social_links')->nullable()->after('operating_hours_note');
            $table->string('linktree_url')->nullable()->default('https://linktr.ee/sevenseries')->after('social_links');
            $table->string('linktree_qr_path')->nullable()->default('images/sevenseries linktree.svg')->after('linktree_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_settings', function (Blueprint $table) {
            $table->dropColumn(['social_links', 'linktree_url', 'linktree_qr_path']);
        });
    }
};
