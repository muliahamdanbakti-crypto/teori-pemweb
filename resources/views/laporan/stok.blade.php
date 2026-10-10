@extends('app')

@section('konten')
<h2>Laporan Stok Menipis (&lt; 5)</h2>

@if($produk->isEmpty())
    <div class="alert alert-success">Semua stok aman!</div>
@else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Stok</th>
                <th>Status</th>
                <th>Nilai (harga x stok)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produk as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->stok }}</td>
                <td>
                    {{-- INI YANG DARI FOTO SINEKAD PAP, PANGGIL ACCESSOR --}}
                    @if($item->status_stok == 'Habis')
                        <span class="badge bg-danger">{{ $item->status_stok }}</span>
                    @elseif($item->status_stok == 'Kritis')
                        <span class="badge bg-warning text-dark">{{ $item->status_stok }}</span>
                    @else
                        <span class="badge bg-info">{{ $item->status_stok }}</span>
                    @endif
                </td>
                <td>Rp {{ number_format($item->harga * $item->stok, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="alert alert-primary">
        <strong>Total Nilai Stok Menipis: Rp {{ number_format($total, 0, ',', '.') }}</strong>
    </div>
@endif

<a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali ke Produk</a>
@endsection