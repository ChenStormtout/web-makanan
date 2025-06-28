@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Kategori</h3>
    <form method="POST" action="{{ route('categories.update', $category) }}">
        @csrf @method('PUT')
        <input type="text" name="name" class="form-control" value="{{ $category->name }}">
        <button class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection
