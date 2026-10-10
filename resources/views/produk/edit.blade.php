@extends('app')

@section('judul', 'Edit Produk')

@section('konten')
<h2>Edit Produk</h2>

@if ($errors->any())
    <div class="validation-errors" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="product-form" action="{{ route('produk.update', $produk) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-field">
    <label for="nama">Nama Produk</label>
    <input id="nama" type="text" name="nama" value="{{ old('nama', $produk->nama) }}" minlength="3" maxlength="100" required>
    @error('nama')
        <p class="field-error" role="alert">{{ $message }}</p>
    @enderror
    </div>

    <div class="form-field">
    <label for="harga">Harga</label>
    <input id="harga" type="number" name="harga" value="{{ old('harga', $produk->harga) }}" min="0" step="any" required>
    @error('harga')
        <p class="field-error" role="alert">{{ $message }}</p>
    @enderror
    </div>

    <div class="form-field">
    <label for="stok">Stok</label>
    <input id="stok" type="number" name="stok" value="{{ old('stok', $produk->stok) }}" min="0" step="1" required>
    @error('stok')
        <p class="field-error" role="alert">{{ $message }}</p>
    @enderror
    </div>

    <div class="form-field">
    <label for="email">Email</label>
    <input id="email" type="email" name="email" value="{{ old('email', $produk->email) }}" required>
    @error('email')
        <p class="field-error" role="alert">{{ $message }}</p>
    @enderror
    </div>

    <div class="form-field">
    <label for="kategori">Kategori</label>
    <select id="kategori" name="kategori" required>
        <option value="">Pilih kategori</option>
        <option value="elektronik" @selected(old('kategori', $produk->kategori) === 'elektronik')>Elektronik</option>
        <option value="atk" @selected(old('kategori', $produk->kategori) === 'atk')>Alat Tulis</option>
        <option value="makanan" @selected(old('kategori', $produk->kategori) === 'makanan')>Makanan</option>
    </select>
    @error('kategori')
        <p class="field-error" role="alert">{{ $message }}</p>
    @enderror
    </div>

    <div class="form-actions">
    <button type="submit">Perbarui</button>
    <a class="button button--quiet" href="{{ route('produk.index') }}">Batal</a>
    </div>
</form>
@endsection
