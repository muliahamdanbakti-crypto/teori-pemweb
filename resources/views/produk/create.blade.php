@extends('app')
@section('judul', 'Tambah Produk - Politeknik Amamapare')

@section('konten')
<h2>Tambah Produk Baru - Politeknik Amamapare Timika</h2>

{{-- Ringkasan semua kesalahan di bagian atas --}}
@if ($errors->any())
    <div style="border:2px solid #ef4444; background:#fef2f2; padding:12px; margin-bottom:15px;">
        <strong>Periksa kembali isian Anda:</strong>
        <ul>
            @foreach ($errors->all() as $pesan)
                <li>{{ $pesan }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Pesan sukses dari session flash --}}
@if (session('sukses'))
    <div style="border:2px solid #10b981; background:#f0fdf4; padding:12px; margin-bottom:15px;">
        {{ session('sukses') }}
    </div>
@endif

<form action="{{ route('produk.store') }}" method="POST" style="max-width:400px;">
    @csrf

    <label>Nama Produk</label><br>
    {{-- old() mengembalikan isian sebelumnya agar tidak hilang --}}
    <input type="text" name="nama" value="{{ old('nama') }}" style="width:100%; padding:8px; margin-bottom:5px;"><br>
    {{-- Pesan kesalahan khusus untuk field ini --}}
    @error('nama')
        <small style="color:#ef4444;">{{ $message }}</small><br>
    @enderror
    <br>

    <label>Harga</label><br>
    <input type="number" name="harga" value="{{ old('harga') }}" style="width:100%; padding:8px; margin-bottom:5px;"><br>
    @error('harga')
        <small style="color:#ef4444;">{{ $message }}</small><br>
    @enderror
    <br>

    <label>Stok</label><br>
    <input type="number" name="stok" value="{{ old('stok') }}" style="width:100%; padding:8px; margin-bottom:5px;"><br>
    @error('stok')
        <small style="color:#ef4444;">{{ $message }}</small><br>
    @enderror
    <br>

    <label>Email</label><br>
    <input type="email" name="email" value="{{ old('email') }}" style="width:100%; padding:8px; margin-bottom:5px;"><br>
    @error('email')
        <small style="color:#ef4444;">{{ $message }}</small><br>
    @enderror
    <br>

    <label>Kategori</label><br>
    <select name="kategori" style="width:100%; padding:8px; margin-bottom:5px;">
        <option value="elektronik" @selected(old('kategori') === 'elektronik')>Elektronik</option>
        <option value="atk" @selected(old('kategori') === 'atk')>ATK</option>
        <option value="makanan" @selected(old('kategori') === 'makanan')>Makanan</option>
    </select><br>
    @error('kategori')
        <small style="color:#ef4444;">{{ $message }}</small><br>
    @enderror
    <br>

    <button type="submit" style="padding:10px 20px; background:#1d4ed8; color:white; border:none; cursor:pointer;">Simpan</button>
    <a href="{{ route('produk.index') }}" style="margin-left:10px;">Kembali</a>
</form>
@endsection