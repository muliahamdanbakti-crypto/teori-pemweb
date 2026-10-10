<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';

    protected $fillable = [
        'kode_barang',
        'nama',
        'kategori_id',
        'supplier_id',
        'harga_beli',
        'harga_jual',
        'stok',
        'satuan',
        'diskon',
        'is_promo',
    ];
}
