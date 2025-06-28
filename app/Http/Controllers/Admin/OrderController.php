<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Menampilkan daftar semua pesanan.
     */
    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Menampilkan detail dari satu pesanan.
     */
    public function show($id)
    {
        $order = Order::with(['items.product', 'user'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Mengubah status pesanan via form.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,done,cancelled',
        ]);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        return redirect()->route('admin.orders.show', $id)
                         ->with('success', 'Status pesanan berhasil diperbarui.');
    }

    /**
     * Menandai pesanan sebagai selesai (status = done).
     */
    public function markAsDone($id)
    {
        $order = Order::findOrFail($id);

        if ($order->status !== 'done') {
            $order->status = 'done';
            $order->save();
        }

        return redirect()->route('admin.orders.show', $id)
                         ->with('success', 'Pesanan telah ditandai sebagai selesai.');
    }

    /**
     * Menghapus pesanan dari database.
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')
                         ->with('success', 'Pesanan berhasil dihapus.');
    }

    /**
     * Generate invoice PDF.
     */
    public function generateInvoice($id)
    {
        $order = Order::with(['items.product', 'user'])->findOrFail($id);
        $pdf = Pdf::loadView('admin.orders.invoice', compact('order'))->setPaper('a4', 'portrait');

        return $pdf->download('invoice-order-' . $order->id . '.pdf');
    }
}
