@extends('app')

@section('judul', 'Detail Produk')

@section('konten')
    <section class="product-detail" style="max-width: 760px; margin: 32px auto 0; padding: 0 16px;">
        <div class="info-card">
            <header class="page-header" style="display: flex; justify-content: space-between; align-items: center; gap: 1rem; flex-wrap: wrap; margin-bottom: 12px;">
                <div>
                    <p style="margin: 0 0 6px; color: #6b7280; font-size: 13px; letter-spacing: 0.08em; text-transform: uppercase; font-weight: 700;">Detail Produk</p>
                    <h2 style="margin: 0; font-size: clamp(1.5rem, 2vw, 2rem);">{{ $produk->nama }}</h2>
                </div>

                <div class="detail-actions">
                    <a class="button" href="{{ route('produk.edit', $produk) }}">Edit produk</a>
                    <a class="button button--quiet" href="{{ route('produk.index') }}">Kembali ke daftar</a>
                </div>
            </header>

            <dl class="detail-list">
                <dt>Harga</dt>
                <dd>Rp{{ number_format((float) $produk->harga, 0, ',', '.') }}</dd>

                <dt>Stok</dt>
                <dd>{{ $produk->stok }}</dd>

                <dt>Email</dt>
                <dd>{{ $produk->email }}</dd>

                <dt>Kategori</dt>
                <dd>{{ ucfirst($produk->kategori) }}</dd>
            </dl>
        </div>
    </section>
@endsection
