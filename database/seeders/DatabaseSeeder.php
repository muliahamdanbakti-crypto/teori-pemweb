<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin Gudang',
            'email' => 'admin@politeknik.ac.id',
        ]);

        $this->call([
            ProductSeeder::class,
        ]);

        Barang::factory()->count(12)->create();
        Barang::factory()->count(4)->create([
            'is_promo' => true,
            'diskon' => 15,
        ]);
    }
}