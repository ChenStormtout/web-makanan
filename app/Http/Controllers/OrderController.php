<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Tampilkan daftar semua pesanan untuk admin.
     */
    public function index()
    {
        $orders = Order::with(['user', 'items.product']) // eager load relasi
                        ->latest()
                        ->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }
}
