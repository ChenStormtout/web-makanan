<x-app-layout>
    <div class="p-6 max-w-xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Edit Produk</h1>
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label>Nama Produk</label>
                <input type="text" name="name" class="w-full border p-2 rounded" value="{{ old('name', $product->name) }}" required>
            </div>
            <div>
                <label>Kategori</label>
                <select name="category_id" class="w-full border p-2 rounded" required>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label>Harga</label>
                <input type="number" name="price" class="w-full border p-2 rounded" value="{{ old('price', $product->price) }}" required>
            </div>
            <div>
                <label>Deskripsi</label>
                <textarea name="description" class="w-full border p-2 rounded">{{ old('description', $product->description) }}</textarea>
            </div>
            <div>
                <label>Gambar (biarkan kosong jika tidak ingin mengganti)</label>
                <input type="file" name="image" class="w-full border p-2 rounded">
                @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" alt="Gambar Produk" class="w-32 mt-2 rounded shadow">
                @endif
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>
