<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProdukController extends Controller
{
    public function index(Request $request): View
    {
        $produk = Product::query()
            ->cari($request->input('cari'))
            ->latest()
            ->get();

        return view('produk.index', [
            'judul' => 'Daftar Produk Unggulan',
            'produk' => $produk,
            'totalNilai' => $produk->sum(fn ($p) => $p->harga * $p->stok),
        ]);
    }

    public function detail(Product $product): View
    {
        return view('produk.show', ['produk' => $product]);
    }

    public function create(): View
    {
        return view('produk.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Product::query()->create($request->validate($this->productRules(), $this->validationMessages()));

        return redirect()->route('produk.index')->with('sukses', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product): View
    {
        return view('produk.edit', ['produk' => $product]);
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $product->update($request->validate($this->productRules(), $this->validationMessages()));

        return redirect()->route('produk.index')->with('sukses', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('produk.index')->with('sukses', 'Produk berhasil dihapus.');
    }

    public function kelola()
    {
        return 'Halaman kelola produk admin';
    }

    private function productRules(): array
    {
        return [
            'nama' => ['required', 'string', 'min:3', 'max:100'],
            'harga' => ['required', 'numeric', 'min:0'],
            'stok' => ['required', 'integer', 'min:0'],
            'email' => ['required', 'email'],
            'kategori' => ['required', 'in:elektronik,atk,makanan'],
        ];
    }

    private function validationMessages(): array
    {
        return [
            'nama.required' => 'Nama produk wajib diisi.',
            'nama.min' => 'Nama produk minimal 3 karakter.',
            'harga.required' => 'Harga produk wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'stok.required' => 'Stok produk wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'kategori.required' => 'Kategori wajib dipilih.',
        ];
    }
}