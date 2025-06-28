<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Tampilkan dashboard sesuai peran user
     */
    public function index()
    {
        $user = Auth::user();

        // Jika Admin
        if ($user->role === 'admin') {
            $totalProduk = Product::count();
            $totalPesanan = Order::count();
            $totalPenjualan = Order::where('status', 'done')->sum('total_price');

            return view('dashboard.admin', compact(
                'totalProduk',
                'totalPesanan',
                'totalPenjualan'
            ));
        }

        // Jika Customer
        $userId = $user->id;

        // Ambil makanan & minuman terbaru
        $makanan = Product::whereHas('category', fn($q) => $q->where('name', 'makanan'))->latest()->get();
        $minuman = Product::whereHas('category', fn($q) => $q->where('name', 'minuman'))->latest()->get();

        // Hitung pesanan menunggu (selain status "done")
        $pendingOrdersCount = Order::where('user_id', $userId)
            ->where('status', '!=', 'done') // ← gunakan 'done' untuk mencocokkan sistem Anda
            ->count();

        // Hitung pesanan berhasil bulan ini (status = 'done')
        $completedOrdersCount = Order::where('user_id', $userId)
            ->where('status', 'done')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        // Pesanan aktif (belum selesai)
        $pesananSaya = Order::where('user_id', $userId)
            ->where('status', '!=', 'done')
            ->latest()
            ->get();

        // Riwayat pesanan selesai
        $riwayatPesanan = Order::where('user_id', $userId)
            ->where('status', 'done')
            ->latest()
            ->get();

        return view('dashboard.customer', compact(
            'makanan',
            'minuman',
            'pendingOrdersCount',
            'completedOrdersCount',
            'pesananSaya',
            'riwayatPesanan'
        ));
    }

    /**
     * Halaman menu makanan (opsional)
     */
    public function menu()
    {
        $makanan = Product::whereHas('category', fn($q) => $q->where('name', 'makanan'))->latest()->get();
        $minuman = Product::whereHas('category', fn($q) => $q->where('name', 'minuman'))->latest()->get();

        return view('customer.menu', compact('makanan', 'minuman'));
    }
}
