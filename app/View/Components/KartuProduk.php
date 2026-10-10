<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class KartuProduk extends Component
{
    public function __construct(
        public Product $produk,
        public string $warna = 'putih',
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.kartu-produk', [
            'produk' => $this->produk,
            'warna' => $this->warna,
        ]);
    }
}
