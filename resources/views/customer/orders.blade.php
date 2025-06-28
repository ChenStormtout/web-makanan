<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Pesanan Saya</h1>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white rounded-xl shadow-md p-4">
            <table class="min-w-full text-sm text-gray-700">
                <thead>
                    <tr class="bg-gray-100 text-left text-xs font-semibold uppercase">
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Kode Pesanan</th>
                        <th class="px-4 py-2">Item</th>
                        <th class="px-4 py-2">Total</th>
                        <th class="px-4 py-2">Metode Bayar</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr class="border-t hover:bg-gray-50 transition">
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 font-medium text-indigo-600">{{ $order->order_code }}</td>
                            <td class="px-4 py-2">
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach ($order->items as $item)
                                        <li>{{ $item->product->name }} ({{ $item->quantity }})</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="px-4 py-2">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                            <td class="px-4 py-2 capitalize">{{ $order->payment_method }}</td>
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 text-xs rounded-full 
                                    {{ $order->status === 'selesai' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-2">{{ $order->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-gray-500 py-6">Belum ada pesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
