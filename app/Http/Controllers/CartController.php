<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CartController extends Controller
{
    // Tampilkan isi keranjang
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('customer.cart', compact('cart'));
    }

    // Tambah produk ke keranjang dengan kuantitas yang ditentukan
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        // --- Start of essential change for "add by number" ---
        // Ambil kuantitas dari request. Jika tidak ada, default ke 1.
        // Ini akan digunakan untuk penambahan awal dari daftar produk.
        $quantityToAdd = $request->input('quantity', 1);

        // Pastikan kuantitas adalah angka dan positif
        if (!is_numeric($quantityToAdd) || (int) $quantityToAdd < 1) {
            return redirect()->route('customer.cart')->with('error', 'Kuantitas harus angka positif.');
        }

        // Konversi ke integer
        $quantityToAdd = (int) $quantityToAdd;
        // --- End of essential change ---


        if (isset($cart[$id])) {
            // Jika produk sudah ada, tambahkan kuantitas yang diinput ke kuantitas yang sudah ada.
            $cart[$id]['quantity'] += $quantityToAdd;
        } else {
            // Jika produk belum ada, tambahkan dengan kuantitas yang ditentukan.
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantityToAdd, // Gunakan kuantitas dari input
            ];
        }

        session()->put('cart', $cart);

        // Tetap arahkan langsung ke halaman cart seperti fungsi dasar Anda
        return redirect()->route('customer.cart')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    // Hapus produk dari keranjang
    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->product_id])) {
            unset($cart[$request->product_id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('customer.cart')->with('success', 'Produk dihapus dari keranjang.');
    }

    // Checkout: simpan pesanan ke database
    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return back()->with('error', 'Keranjang kosong.');
        }

        // Validasi input alamat dan metode bayar
        $request->validate([
            'address' => 'required|string|max:255',
            'payment_method' => 'required|in:cod,transfer,qris'
        ]);

        // Validasi isi cart
        foreach ($cart as $item) {
            // Menggunakan Product::find($item['id']) untuk validasi yang lebih kuat di checkout
            // Ini tidak mengubah fungsi dasar, hanya menambah keamanan.
            $product = Product::find($item['id']);
            if (!$product || !isset($item['quantity']) || !isset($item['price']) || (int) $item['quantity'] <= 0) {
                 return back()->with('error', 'Data produk dalam keranjang tidak lengkap atau tidak valid.');
            }
            // Opsional: Anda bisa menambahkan validasi harga di sini jika ingin memastikan harga di keranjang sesuai DB
            // if ($product->price != $item['price']) {
            //     return back()->with('error', 'Harga produk ' . $product->name . ' telah berubah. Mohon perbarui keranjang Anda.');
            // }
        }

        // Hitung total harga
        $total = 0;
        foreach ($cart as $item) {
            $total += ((int) $item['price']) * ((int) $item['quantity']);
        }

        // Simpan order
        $order = Order::create([
            'user_id' => Auth::id(),
            'order_code' => strtoupper(Str::random(10)),
            'address' => $request->address,
            'total_price' => $total,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
            'order_type' => 'via_web',
        ]);

        // Simpan item pesanan
        foreach ($cart as $item) {
            // Menggunakan $item['id'] langsung seperti fungsi dasar Anda
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => (int) $item['quantity'],
                'price' => (int) $item['price'],
            ]);
        }

        // Bersihkan session keranjang
        session()->forget('cart');

        return redirect()->route('customer.orders')->with('success', 'Checkout berhasil. Pesanan Anda telah dicatat.');
    }
}