<!doctype html>
<html>
<head>
    <title>Toko Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
<nav class="navbar navbar-light bg-light shadow-sm">
    <div class="container d-flex align-items-center justify-content-between gap-3">
        <a class="navbar-brand d-flex align-items-center gap-3" href="{{ route('produk.index') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Logo Politeknik Amamapare Timika" width="46" height="46" class="rounded-circle border border-secondary-subtle bg-white">
            <div class="d-flex flex-column">
                <span class="fw-bold text-dark">Politeknik Amamapare Timika</span>
                <small class="text-muted">Sistem Produk</small>
            </div>
        </a>
        <div class="d-flex align-items-center gap-3">
            <a class="nav-link fw-semibold" href="{{ route('dashboard') }}">Dashboard</a>
            <a class="nav-link fw-semibold" href="{{ route('promo.index') }}">Promo</a>
            <a class="nav-link fw-semibold" href="{{ route('laporan.stok') }}">Laporan Stok Menipis</a>
        </div>
    </div>
</nav>

<div class="container mt-4 flex-grow-1">
    @if(session('sukses'))
        <div class="alert alert-success">{{ session('sukses') }}</div>
    @endif
    
    @yield('konten')
</div>

<footer class="bg-dark text-white mt-4 py-3">
    <div class="container text-center small">
        © {{ date('Y') }} Politeknik Amamapare Timika.
    </div>
</footer>
</body>
</html>