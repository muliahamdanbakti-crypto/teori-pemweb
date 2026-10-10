<?php

namespace App\Http\Controllers;

use App\Models\Product;

class PenjualanController extends Controller
{
    // Sesuai foto: pakai Route Model Binding, controller jadi kurus
    public function struk(Product $produk)
    {
        return view('penjualan.struk', compact('produk'));
    }
}