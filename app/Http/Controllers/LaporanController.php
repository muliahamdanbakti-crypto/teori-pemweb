<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class LaporanController extends Controller
{
    public function index(): View
    {
        $produk = Product::query()->stokMenipis()->get();
        $total = $produk->sum(fn ($item) => $item->harga * $item->stok);

        return view('laporan.stok', [
            'produk' => $produk,
            'total' => $total,
        ]);
    }

    public function stokMenipis(): View
    {
        $produk = Product::query()->stokMenipis()->get();
        $total = $produk->sum(fn ($item) => $item->harga * $item->stok);

        return view('laporan.stok', [
            'produk' => $produk,
            'total' => $total,
        ]);
    }

    public function stokHabis(): View
    {
        $produk = Product::query()->where('stok', 0)->get();
        $total = $produk->sum(fn ($item) => $item->harga * $item->stok);

        return view('laporan.stok', [
            'produk' => $produk,
            'total' => $total,
        ]);
    }
}