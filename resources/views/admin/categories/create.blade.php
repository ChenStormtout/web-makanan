@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Kategori</h3>
    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <input type="text" name="name" class="form-control" placeholder="Nama kategori">
        <button class="btn btn-primary mt-2">Simpan</button>
    </form>
</div>
@endsection
