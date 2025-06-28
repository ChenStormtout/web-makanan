<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // <-- Tambahkan ini!

class MenuController extends Controller
{
    public function index() {
        return view('menu.index', [
            'products' => Product::with('category')->latest()->get()
        ]);
    }
}
