<x-app-layout>
    <div class="p-6 max-w-xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Tambah Produk</h1>
        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label>Nama Produk</label>
                <input type="text" name="name" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label>Kategori</label>
                <select name="category_id" class="w-full border p-2 rounded" required>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Harga</label>
                <input type="number" name="price" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label>Deskripsi</label>
                <textarea name="description" class="w-full border p-2 rounded"></textarea>
            </div>
            <div>
                <label>Gambar</label>
                <input type="file" name="image" class="w-full border p-2 rounded">
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>
