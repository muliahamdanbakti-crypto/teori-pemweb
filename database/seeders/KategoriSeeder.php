<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->insert([
            ['kode' => 'ELK', 'nama' => 'Elektronik', 'aktif' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['kode' => 'ATK', 'nama' => 'Alat Tulis', 'aktif' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['kode' => 'KBR', 'nama' => 'Kebersihan', 'aktif' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
