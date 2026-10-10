@extends('app')

@section('judul', 'Daftar Produk - Politeknik Amamapare')

@section('konten')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h2 class="mb-1">Daftar Produk</h2>
            <p class="text-muted mb-0">Politeknik Amamapare Timika</p>
        </div>
        <a href="{{ route('produk.create') }}" class="btn btn-primary">+ Tambah Produk</a>
    </div>

    @if (session('sukses'))
        <div class="alert alert-success">{{ session('sukses') }}</div>
    @endif

    <div class="row g-3 mb-4">
        @forelse ($produk as $p)
            <div class="col-md-4">
                <x-kartu-produk :produk="$p" warna="primary">
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <span class="small text-muted">Stok: {{ $p->stok }}</span>
                        <a href="{{ route('produk.detail', $p) }}" class="btn btn-sm btn-outline-primary">Lihat</a>
                    </div>
                </x-kartu-produk>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info mb-0">Produk tidak ditemukan.</div>
            </div>
        @endforelse
    </div>

    <div class="alert alert-info mt-3 mb-0">
        <strong>Total nilai persediaan:</strong> Rp{{ number_format($totalNilai ?? 0, 0, ',', '.') }}
    </div>
@endsection