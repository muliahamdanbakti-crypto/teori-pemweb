<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'nama' => 'Laptop',
                'harga' => 7500000,
                'stok' => 10,
                'email' => 'laptop@gmail.com',
                'kategori' => 'elektronik',
            ],
            [
                'nama' => 'Mouse',
                'harga' => 150000,
                'stok' => 0,
                'email' => 'mouse@gmail.com',
                'kategori' => 'elektronik',
            ],
            [
                'nama' => 'Keyboard',
                'harga' => 320000,
                'stok' => 5,
                'email' => 'keyboard@gmail.com',
                'kategori' => 'atk',
            ],
        ];

        foreach ($products as $product) {
            Product::query()->firstOrCreate(
                ['email' => $product['email']],
                $product,
            );
        }
    }
}
