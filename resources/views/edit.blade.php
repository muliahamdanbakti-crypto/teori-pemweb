@extends('app')
@section('konten')
<h2>Edit Produk</h2>

<form action="{{ route('produk.update', $produk->id) }}" method="POST">
    @csrf
    @method('PUT')  {{-- INI KUNCINYA --}}

    <input type="text" name="nama" value="{{ $produk->nama }}">
    <button type="submit">Perbarui</button>
</form>
@endsection