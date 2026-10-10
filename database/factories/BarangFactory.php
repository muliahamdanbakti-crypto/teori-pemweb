<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    protected $model = Barang::class;

    public function definition(): array
    {
        return [
            'kode_barang' => fake()->unique()->ean8(),
            'nama' => fake()->words(3, true),
            'kategori_id' => fake()->numberBetween(1, 3),
            'supplier_id' => null,
            'harga_beli' => fake()->randomFloat(2, 5000, 100000),
            'harga_jual' => fake()->randomFloat(2, 100000, 200000),
            'stok' => fake()->numberBetween(1, 100),
            'satuan' => 'pcs',
            'diskon' => 0,
            'is_promo' => false,
        ];
    }
}