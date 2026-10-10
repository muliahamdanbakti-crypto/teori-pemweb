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
        Schema::table('barangs', function (Blueprint $table) {
            $table->decimal('diskon', 5, 2)->default(0)->after('harga');
            $table->boolean('is_promo')->default(false)->after('diskon');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('barangs', function (Blueprint $table) {
            // Hanya membuang kolom yang ditambahkan di atas
            $table->dropColumn(['diskon', 'is_promo']);
        });
    }
};