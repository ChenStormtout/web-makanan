<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['items.product']) // relasi ke items dan produknya
            ->where('user_id', auth()->id())
            ->where('status', '!=', 'selesai') // pesanan belum selesai
            ->latest()
            ->get();

        return view('customer.orders.index', compact('orders'));
    }
}


