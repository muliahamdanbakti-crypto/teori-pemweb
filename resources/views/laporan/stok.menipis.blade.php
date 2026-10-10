@extends('layouts.app')
@section('konten')
<h1>Laporan</h1>
@forelse($data as $d)
    <p>{{ $d->nama }} - stok {{ $d->stok }}</p>
@empty
    <p>Data kosong</p>
@endforelse
@endsection