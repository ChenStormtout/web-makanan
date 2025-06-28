@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Data Kategori</h3>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-2">Tambah Kategori</a>

    <table class="table table-bordered">
        <tr>
            <th>#</th><th>Nama</th><th>Aksi</th>
        </tr>
        @foreach($categories as $cat)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $cat->name }}</td>
            <td>
                <a href="{{ route('categories.edit', $cat) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('categories.destroy', $cat) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
