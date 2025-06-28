<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class HistoryController extends Controller
{
    /**
     * Tampilkan daftar riwayat pesanan yang sudah selesai
     */
    public function index()
    {
        $userId = Auth::id();

        // Ambil pesanan milik user yang sudah selesai (status = 'done')
        $histories = Order::where('user_id', $userId)
            ->where('status', 'done')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('customer.history.index', compact('histories'));
    }
}
