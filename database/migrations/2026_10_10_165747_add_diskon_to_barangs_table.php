<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('barangs')) {
            return;
        }

        Schema::table('barangs', function (Blueprint $table) {
            if (! Schema::hasColumn('barangs', 'diskon')) {
                $table->decimal('diskon', 5, 2)->default(0);
            }

            if (! Schema::hasColumn('barangs', 'is_promo')) {
                $table->boolean('is_promo')->default(false);
            }
        });
    }

    public function down(): void
    {
        if (! Schema::hasTable('barangs')) {
            return;
        }

        Schema::table('barangs', function (Blueprint $table) {
            if (Schema::hasColumn('barangs', 'diskon')) {
                $table->dropColumn('diskon');
            }

            if (Schema::hasColumn('barangs', 'is_promo')) {
                $table->dropColumn('is_promo');
            }
        });
    }
};
