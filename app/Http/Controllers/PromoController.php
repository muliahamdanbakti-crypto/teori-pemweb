<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\View\View;

class PromoController extends Controller
{
    public function index(): View
    {
        $promo = Barang::query()
            ->where('is_promo', true)
            ->orderByDesc('diskon')
            ->orderByDesc('updated_at')
            ->get();

        return view('promo.index', [
            'promo' => $promo,
            'totalPromo' => $promo->count(),
        ]);
    }
}
