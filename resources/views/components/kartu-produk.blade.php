@props(['produk', 'warna' => 'putih'])

<div class="card h-100 shadow-sm border-0">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-start gap-2">
            <h5 class="card-title mb-1">{{ $produk->nama }}</h5>
            <span class="badge bg-{{ $warna }} text-white">{{ ucfirst($produk->kategori) }}</span>
        </div>

        <p class="text-muted mb-2">Rp{{ number_format((float) $produk->harga, 0, ',', '.') }}</p>

        <div class="small text-body-secondary">
            {{ $slot }}
        </div>
    </div>
</div>