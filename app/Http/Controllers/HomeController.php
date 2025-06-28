<?php

namespace App\Http\Controllers; // Namespace untuk HomeController

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Diperlukan untuk mengecek status login user

class HomeController extends Controller // Deklarasi kelas HomeController, mewarisi dari base Controller Laravel
{
    /**
     * Menampilkan dashboard aplikasi atau mengarahkan ke halaman login.
     *
     * Method ini adalah titik masuk utama untuk rute '/dashboard'.
     *
     * @return \Illuminate\Contracts\Support\Renderable|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        // Memeriksa apakah ada user yang sedang terautentikasi (sudah login).
        if (Auth::check()) {
            // Jika user sudah login, kita akan menampilkan view 'dashboard'.
            // View ini biasanya terletak di 'resources/views/dashboard.blade.php'.
            // Di sini Anda dapat menambahkan logika lebih lanjut
            // berdasarkan peran user atau data spesifik lainnya.
            // Contoh:
            // if (Auth::user()->role === 'admin') {
            //     return view('admin.dashboard');
            // } else {
            //     return view('user.dashboard');
            // }
            return view('dashboard');
        }

        // Jika user belum login, kita arahkan mereka ke halaman login.
        // `route('login')` akan mengarahkan ke URL yang sesuai dengan nama rute 'login'
        // yang didefinisikan oleh Laravel Breeze di 'routes/auth.php'.
        return redirect()->route('login');
    }

    /*
     * Anda dapat menambahkan method lain di sini sesuai kebutuhan.
     * Contoh:
     * public function showSettings()
     * {
     * // Logika untuk menampilkan halaman pengaturan user
     * return view('user.settings');
     * }
     *
     * public function updateSettings(Request $request)
     * {
     * // Logika untuk memproses dan menyimpan data pengaturan
     * $request->validate([
     * 'username' => 'required|string|max:255',
     * 'email' => 'required|string|email|max:255|unique:users,email,'.Auth::id(),
     * ]);
     * // ... update user data ...
     * return back()->with('status', 'Pengaturan berhasil diperbarui!');
     * }
     */
}