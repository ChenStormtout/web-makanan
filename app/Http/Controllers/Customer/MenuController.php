<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class MenuController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get(); // Ambil semua produk
        return view('customer.menu', compact('products'));
    }
}

