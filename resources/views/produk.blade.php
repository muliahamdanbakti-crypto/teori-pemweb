<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
</head>
<body>
    <h1>Daftar Produk</h1>
<a href="{{ route('produk.detail', 7) }}">Lihat produk 7</a>
<br>
<a href="/menu">Kembali ke menu</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Produk</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products ?? [] as $product)
                <tr>
                    <td>{{ $product['nama'] ?? 'Produk' }}</td>
                </tr>
            @empty
                <tr>
                    <td>Belum ada produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <p>
        <h1>Detail Produk Nomor {{ $id }}</h1>
<a href="{{ route('produk.index') }}">Kembali ke Daftar</a>
        <a href="{{ route('produk.index') }}">Daftar Produk</a> |
        <a href="{{ route('produk.detail', 7) }}">Lihat Produk #7</a>
    </p>
</body>
</html>