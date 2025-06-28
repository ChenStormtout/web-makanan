<x-app-layout>
    <div class="p-6">
        <h1 class="text-2xl font-semibold mb-4 text-gray-800">Pesanan Saya</h1>

        <div class="overflow-x-auto bg-white rounded-2xl shadow p-4">
            <table class="min-w-full table-auto text-sm text-gray-700">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="px-4 py-2">#</th>
                        <th class="px-4 py-2">Kode Pesanan</th>
                        <th class="px-4 py-2">Daftar Produk</th>
                        <th class="px-4 py-2">Total Harga</th>
                        <th class="px-4 py-2">Metode Bayar</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Loop pesanan --}}
                    @forelse ($orders as $order)
                        <tr class="border-t hover:bg-gray-50 transition">
                            <td class="px-4 py-2 align-top">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 align-top font-semibold text-gray-900">{{ $order->order_code }}</td>
                            <td class="px-4 py-2">
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach ($order->items as $item)
                                        <li>
                                            {{ $item->product->name }} &times; {{ $item->quantity }} = 
                                            Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="px-4 py-2 align-top font-medium text-green-700">
                                Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                            </td>
                            <td class="px-4 py-2 align-top capitalize">
                                {{ $order->payment_method }}
                            </td>
                            <td class="px-4 py-2 align-top">
                                <span class="px-2 py-1 rounded-full text-xs
                                    {{ $order->status == 'done' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-2 align-top">{{ $order->created_at->format('d M Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-gray-500 py-4">Belum ada pesanan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
