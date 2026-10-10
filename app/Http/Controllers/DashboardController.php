<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $produk = Product::query()->latest()->take(5)->get();

        return view('dashboard', [
            'totalProduk' => Product::query()->count(),
            'totalStok' => Product::query()->sum('stok'),
            'nilaiProduk' => Product::query()->sum(DB::raw('harga * stok')),
            'produkTerbaru' => $produk,
        ]);
    }
}
