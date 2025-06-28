<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition duration-200 ease-in-out">
    <a href="#">
        <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/400x300/F59E0B/FFF?text=Produk' }}"
             alt="{{ $product->name }}"
             class="w-full h-48 object-cover">
    </a>
    <div class="p-4">
        <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $product->name }}</h3>
        <p class="text-sm text-gray-600 mb-3">{{ $product->description }}</p>
        <div class="flex justify-between items-center">
            <span class="text-xl font-bold text-orange-600">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
            <form action="{{ route('customer.cart.add', $product->id) }}" method="POST">
                @csrf
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-orange-500 text-white font-semibold rounded-lg shadow-md hover:bg-orange-600 transform hover:-translate-y-0.5 transition-all duration-200 text-sm">
                    <i data-lucide="shopping-cart" class="w-4 h-4 mr-2"></i>
                    Pesan
                </button>
            </form>
        </div>
    </div>
</div>

