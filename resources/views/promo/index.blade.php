@extends('app')

@section('judul', 'Promo Produk')

@section('konten')
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
            <h2 class="mb-1">Promo Hari Ini</h2>
            <p class="text-muted mb-0">Produk yang sedang mendapatkan potongan harga.</p>
        </div>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-dark">Kembali ke Dashboard</a>
    </div>

    @if ($promo->isEmpty())
        <div class="alert alert-info mb-0">
            Saat ini belum ada produk promo aktif.
        </div>
    @else
        <div class="row g-4">
            @foreach ($promo as $item)
                <div class="col-md-4">
                    <div class="card border-warning shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <span class="badge bg-warning text-dark align-self-start mb-3">Promo {{ $item->diskon }}%</span>
                            <h4 class="card-title mb-2">{{ $item->nama }}</h4>
                            <p class="text-muted mb-2">Kode: {{ $item->kode_barang }}</p>
                            <p class="mb-2"><strong>Harga Normal:</strong> Rp {{ number_format($item->harga_jual, 0, ',', '.') }}</p>
                            <p class="mb-2"><strong>Stok:</strong> {{ $item->stok }} {{ $item->satuan }}</p>
                            <div class="mt-auto">
                                <span class="text-success fw-bold">Harga Promo:</span>
                                <div class="fs-4 fw-bold">Rp {{ number_format($item->harga_jual - ($item->harga_jual * ($item->diskon / 100)), 0, ',', '.') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
