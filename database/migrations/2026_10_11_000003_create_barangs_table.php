<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('barangs')) {
            Schema::create('barangs', function (Blueprint $table) {
                $table->id();
                $table->string('kode_barang', 20)->unique();
                $table->string('nama', 150)->index();
                $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade');
                $table->foreignId('supplier_id')->nullable()->constrained('suppliers')->onDelete('set null');
                $table->decimal('harga_beli', 12, 2);
                $table->decimal('harga_jual', 12, 2);
                $table->integer('stok')->default(0);
                $table->string('satuan', 20)->default('pcs');
                $table->decimal('diskon', 5, 2)->default(0);
                $table->boolean('is_promo')->default(false);
                $table->timestamps();
                $table->index(['kategori_id', 'nama']);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
