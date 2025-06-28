<x-app-layout>
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="receipt" class="w-5 h-5 text-orange-600"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">Detail Pesanan</h1>
                    <p class="text-sm text-gray-500">#{{ $order->id }}</p>
                </div>
            </div>

            <!-- Status Badge -->
            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium
                @switch($order->status)
                    @case('pending') bg-yellow-100 text-yellow-700 border border-yellow-200 @break
                    @case('processing') bg-blue-100 text-blue-700 border border-blue-200 @break
                    @case('done') bg-green-100 text-green-700 border border-green-200 @break
                    @default bg-gray-100 text-gray-700 border border-gray-200
                @endswitch
            ">
                <span class="w-2 h-2 rounded-full mr-2
                    @switch($order->status)
                        @case('pending') bg-yellow-400 @break
                        @case('processing') bg-blue-400 @break
                        @case('done') bg-green-400 @break
                        @default bg-gray-400
                    @endswitch
                "></span>
                {{ ucfirst($order->status) }}
            </span>
        </div>
    </div>

    <!-- Info Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Customer Info -->
        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="user" class="w-4 h-4 text-blue-600"></i>
                </div>
                <h3 class="font-medium text-gray-900">Informasi Pelanggan</h3>
            </div>
            <p class="text-gray-900 font-medium">{{ $order->user->name ?? '-' }}</p>
            <p class="text-sm text-gray-600 mt-1">{{ $order->user->email ?? '-' }}</p>
        </div>

        <!-- Order Date -->
        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="calendar" class="w-4 h-4 text-green-600"></i>
                </div>
                <h3 class="font-medium text-gray-900">Tanggal Pesanan</h3>
            </div>
            <p class="text-gray-900 font-medium">{{ $order->created_at->format('d M Y') }}</p>
            <p class="text-sm text-gray-600 mt-1">{{ $order->created_at->format('H:i') }} WIB</p>
        </div>

        <!-- Total -->
        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="banknote" class="w-4 h-4 text-orange-600"></i>
                </div>
                <h3 class="font-medium text-gray-900">Total Pembayaran</h3>
            </div>
            <p class="text-2xl font-semibold text-gray-900">Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
        </div>
    </div>

    <!-- Order Items -->
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="shopping-bag" class="w-4 h-4 text-purple-600"></i>
                </div>
                <h2 class="text-lg font-medium text-gray-900">Item Pesanan</h2>
                <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">
                    {{ $order->items->count() }} item
                </span>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Produk</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Jumlah</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Harga Satuan</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($order->items as $item)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="package" class="w-4 h-4 text-gray-500"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $item->product->name ?? '-' }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-800 text-sm font-medium rounded-full">
                                    {{ $item->quantity }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right font-medium text-gray-900">
                                Rp {{ number_format($item->price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-right font-semibold text-gray-900">
                                Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-50">
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-right font-medium text-gray-900">Total Keseluruhan:</td>
                        <td class="px-6 py-4 text-right text-xl font-bold text-gray-900">
                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex items-center justify-between mt-8">
        <a href="{{ route('admin.orders.index') }}"
           class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
            Kembali ke Daftar Pesanan
        </a>

        <div class="flex space-x-3">
            <!-- Cetak Invoice -->
            <a href="{{ route('admin.orders.invoice', $order->id) }}"
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-700 bg-blue-100 border border-blue-200 rounded-lg hover:bg-blue-200 transition-colors duration-200">
                <i data-lucide="printer" class="w-4 h-4 mr-2"></i>
                Cetak Invoice
            </a>

            <!-- Tandai Selesai -->
            @if ($order->status !== 'done')
            <form method="POST" action="{{ route('admin.orders.done', $order->id) }}">
                  @csrf
                  @method('PUT')
                   <input type="hidden" name="status" value="done">
                  <button type="submit"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-green-600 rounded-lg hover:bg-green-700 transition-colors duration-200">
                  <i data-lucide="check" class="w-4 h-4 mr-2"></i>
                  Tandai Selesai
                  </button>
            /form>
            @endif
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</x-app-layout>
