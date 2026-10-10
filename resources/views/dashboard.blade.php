@extends('app')

@section('judul', 'Dashboard')

@section('konten')
    <section class="dashboard" style="max-width: 1100px; margin: 2rem auto; padding: 0 1rem;">
        <div style="display: flex; justify-content: space-between; align-items: center; gap: 1rem; margin-bottom: 1.5rem; flex-wrap: wrap;">
            <div>
                <h2 style="margin: 0; font-size: 2rem;">Dashboard</h2>
                <p style="margin: 0.25rem 0 0; color: #4b5563;">Ringkasan produk dan stok toko.</p>
            </div>
            <a href="{{ route('produk.index') }}" style="display: inline-block; padding: 0.75rem 1rem; background: #111827; color: white; border-radius: 0.5rem; text-decoration: none;">Lihat Produk</a>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
            <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 0.75rem; padding: 1rem; box-shadow: 0 1px 2px rgba(0,0,0,0.04);">
                <div style="font-size: 0.85rem; color: #6b7280;">Total Produk</div>
                <div style="font-size: 2rem; font-weight: 700; margin-top: 0.5rem;">{{ $totalProduk }}</div>
            </div>

            <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 0.75rem; padding: 1rem; box-shadow: 0 1px 2px rgba(0,0,0,0.04);">
                <div style="font-size: 0.85rem; color: #6b7280;">Total Stok</div>
                <div style="font-size: 2rem; font-weight: 700; margin-top: 0.5rem;">{{ $totalStok }}</div>
            </div>

            <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 0.75rem; padding: 1rem; box-shadow: 0 1px 2px rgba(0,0,0,0.04);">
                <div style="font-size: 0.85rem; color: #6b7280;">Nilai Produk</div>
                <div style="font-size: 1.5rem; font-weight: 700; margin-top: 0.5rem;">Rp {{ number_format($nilaiProduk ?? 0, 0, ',', '.') }}</div>
            </div>
        </div>

        <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 0.75rem; padding: 1rem; box-shadow: 0 1px 2px rgba(0,0,0,0.04); margin-bottom: 2rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; gap: 1rem; flex-wrap: wrap; margin-bottom: 1rem;">
                <h3 style="margin: 0;">Promo Hari Ini</h3>
                <a href="{{ route('promo.index') }}" style="color: #0f172a; text-decoration: none; font-weight: 600;">Lihat semua promo</a>
            </div>

            @php($promoProduk = \App\Models\Barang::query()->where('is_promo', true)->orderByDesc('diskon')->limit(3)->get())

            @if ($promoProduk->isEmpty())
                <p style="margin: 0; color: #6b7280;">Belum ada produk promo saat ini.</p>
            @else
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                    @foreach ($promoProduk as $promo)
                        <div style="border: 1px solid #f59e0b; background: #fff7ed; border-radius: 0.75rem; padding: 1rem;">
                            <span style="display: inline-block; background: #f59e0b; color: white; padding: 0.25rem 0.5rem; border-radius: 999px; font-size: 0.75rem; font-weight: 700;">Promo</span>
                            <h4 style="margin: 0.75rem 0 0.25rem;">{{ $promo->nama }}</h4>
                            <p style="margin: 0; color: #4b5563;">Diskon {{ $promo->diskon }}%</p>
                            <p style="margin: 0.5rem 0 0; font-weight: 700;">Rp {{ number_format($promo->harga_jual, 0, ',', '.') }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 0.75rem; padding: 1rem; box-shadow: 0 1px 2px rgba(0,0,0,0.04);">
            <h3 style="margin-top: 0;">Produk Terbaru</h3>

            @if ($produkTerbaru->isEmpty())
                <p style="margin: 0; color: #6b7280;">Belum ada produk yang ditambahkan.</p>
            @else
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 1px solid #e5e7eb; text-align: left;">
                            <th style="padding: 0.75rem 0.5rem;">Nama</th>
                            <th style="padding: 0.75rem 0.5rem;">Kategori</th>
                            <th style="padding: 0.75rem 0.5rem;">Harga</th>
                            <th style="padding: 0.75rem 0.5rem;">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produkTerbaru as $produk)
                            <tr style="border-bottom: 1px solid #f3f4f6;">
                                <td style="padding: 0.75rem 0.5rem;">{{ $produk->nama }}</td>
                                <td style="padding: 0.75rem 0.5rem; text-transform: capitalize;">{{ $produk->kategori }}</td>
                                <td style="padding: 0.75rem 0.5rem;">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                                <td style="padding: 0.75rem 0.5rem;">{{ $produk->stok }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </section>
@endsection
