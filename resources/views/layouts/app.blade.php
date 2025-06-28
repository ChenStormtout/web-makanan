<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ auth()->user()->role === 'admin' ? 'Admin Dashboard - SeblakMania' : 'Dashboard Pelanggan - SeblakMania' }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        :root {
            --primary-color:rgb(255, 150, 118); /* Oranye Kemerahan yang lebih lembut */
            --secondary-color: #FFA726; /* Oranye Cerah */
            --accent-color: #FFD54F; /* Kuning Keemasan */
            --text-dark: #2A363B; /* Abu-abu gelap elegan */
            --text-light: #5B6F7B; /* Abu-abu sedang */
            --white: #FFFFFF;
            --bg-gradient: linear-gradient(135deg,rgb(255, 227, 199) 0%,rgb(237, 237, 237) 100%); /* Gradien ungu-biru yang lebih menenangkan */
            --shadow-light: 0 6px 20px rgba(0, 0, 0, 0.08);
            --shadow-medium: 0 10px 30px rgba(0, 0, 0, 0.12);
            --shadow-heavy: 0 16px 48px rgba(0, 0, 0, 0.2);
            --card-bg-opacity: 0.9; /* Opasitas kartu untuk glassmorphism */
            --border-opacity: 0.3; /* Opasitas border kartu */
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-gradient); /* Menggunakan gradien utama */
            min-height: 100vh;
            color: var(--text-dark);
            position: relative;
            overflow-x: hidden;
            display: flex; /* Untuk layout flexbox utama */
        }

        /* Grain effect for background */
        body::before {
            content: '';
            position: fixed; /* Fixed position so it doesn't scroll with content */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="0.8" fill="rgba(255,255,255,0.05)"/><circle cx="80" cy="40" r="0.6" fill="rgba(255,255,255,0.04)"/><circle cx="40" cy="80" r="1" fill="rgba(255,255,255,0.03)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
            opacity: 0.7;
            z-index: -1; /* Send it to the back */
        }

        /* Main layout container */
        .app-container {
            display: flex;
            height: 100vh;
            width: 100%;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 250px; /* Lebar sidebar */
            flex-shrink: 0;
            background: rgba(255, 255, 255, 0.9); /* Glassmorphism background */
            backdrop-filter: blur(20px); /* Efek blur */
            border-right: 1px solid rgba(255, 255, 255, var(--border-opacity)); /* Border transparan */
            box-shadow: var(--shadow-medium); /* Shadow lebih lembut */
            display: flex;
            flex-direction: column;
            overflow-y: auto; /* Scrollable sidebar if content is long */
            z-index: 10; /* Pastikan di atas konten utama */
        }

        .sidebar-header {
            height: 90px; /* Tinggi header sidebar */
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.5); /* Border bawah lebih jelas */
        }

        .sidebar-header h1 {
            font-family: 'Playfair Display', serif; /* Font logo */
            font-size: 2rem; /* Ukuran font lebih besar */
            font-weight: 700;
            color: var(--primary-color); /* Warna logo */
            letter-spacing: 1px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .sidebar-nav {
            flex-grow: 1;
            padding: 1.5rem 1rem; /* Padding lebih besar */
            display: flex; /* Jadikan flex container */
            flex-direction: column; /* Atur arah flex ke kolom */
        }

        .nav-title {
            padding: 0 1rem;
            margin-bottom: 1rem;
            font-size: 0.75rem; /* text-xs */
            font-weight: 600; /* font-semibold */
            letter-spacing: 0.05em; /* tracking-wider */
            color: var(--text-light); /* text-gray-400 */
            text-transform: uppercase;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem; /* px-4 py-3 */
            border-radius: 0.75rem; /* rounded-lg */
            color: var(--text-dark); /* text-gray-600 */
            transition: all 0.2s ease; /* duration-200 */
            text-decoration: none;
            margin-bottom: 0.25rem; /* Space between links */
        }

        .nav-link:hover {
            background-color: rgba(var(--primary-color), 0.1); /* Hover background with theme color */
            color: var(--primary-color);
        }
        .nav-link:hover i {
            color: var(--primary-color);
        }

        .nav-link i {
            width: 1.25rem; /* w-5 */
            height: 1.25rem; /* h-5 */
            color: var(--text-light); /* Default icon color */
            transition: color 0.2s ease;
        }

        .nav-link span {
            margin-left: 1rem; /* ml-4 */
            font-weight: 500;
        }

        .active-link {
            background: linear-gradient(90deg, rgba(var(--primary-color), 0.15) 0%, rgba(var(--primary-color), 0) 100%);
            color: var(--primary-color);
            border-left: 5px solid var(--primary-color); /* Border kiri tebal */
            font-weight: 600;
            box-shadow: inset 0 0 10px rgba(var(--primary-color), 0.05);
        }
        .active-link i {
            color: var(--primary-color);
        }

        /* Logout Section */
        .logout-section {
            padding: 1.5rem; /* p-4 */
            border-top: 1px solid rgba(255, 255, 255, 0.5); /* Border atas transparan */
        }

        .logout-button {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1rem; /* py-2 px-4 */
            font-size: 0.9rem; /* text-sm */
            font-weight: 500; /* font-medium */
            color: var(--text-dark); /* text-gray-600 */
            background: rgba(255, 255, 255, 0.7); /* Lebih transparan */
            border-radius: 0.75rem; /* rounded-lg */
            transition: all 0.2s ease;
            box-shadow: var(--shadow-light);
            border: 1px solid rgba(255, 255, 255, 0.3);
            cursor: pointer;
        }

        .logout-button:hover {
            background: var(--primary-color); /* Hover background merah */
            color: var(--white);
            box-shadow: var(--shadow-medium);
            transform: translateY(-2px);
        }
        .logout-button:hover i {
            color: var(--white);
        }
        .logout-button i {
            width: 1rem; /* w-4 */
            height: 1rem; /* h-4 */
            margin-right: 0.5rem; /* mr-2 */
            color: var(--text-light); /* Default icon color */
            transition: color 0.2s ease;
        }

        /* Main Content Area */
        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden; /* Prevent horizontal scroll */
            position: relative; /* For z-index context */
            z-index: 1; /* Make sure content is above grain */
        }

        /* Topbar Styling */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 2rem; /* p-6 */
            background: rgba(255, 255, 255, 0.9); /* Glassmorphism background */
            backdrop-filter: blur(20px);
            box-shadow: var(--shadow-light); /* shadow-sm */
            border-bottom: 1px solid rgba(255, 255, 255, var(--border-opacity));
            z-index: 5; /* Di atas main content */
            position: sticky; /* Sticky top */
            top: 0;
        }

        .topbar-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem; /* text-xl ditingkatkan */
            font-weight: 600; /* font-semibold */
            color: var(--text-dark); /* text-gray-800 */
            text-decoration: none;
            transition: color 0.2s ease;
        }
        .topbar-title:hover {
            color: var(--primary-color); /* hover:text-orange-500 */
        }

        .profile-dropdown {
            position: relative;
        }

        .profile-button {
            display: flex;
            align-items: center;
            padding: 0.5rem 0.75rem;
            border-radius: 9999px; /* rounded-full */
            background: rgba(var(--primary-color), 0.1);
            transition: background 0.2s ease;
            cursor: pointer;
        }

        .profile-button:hover {
            background: rgba(var(--primary-color), 0.2);
        }

        .profile-avatar {
            width: 40px; /* w-10 */
            height: 40px; /* h-10 */
            border-radius: 50%; /* rounded-full */
            object-fit: cover;
            border: 2px solid var(--primary-color);
            box-shadow: var(--shadow-light);
        }

        .profile-name {
            color: var(--text-dark); /* text-gray-600 */
            margin-left: 0.75rem; /* space-x-2 */
            font-weight: 500;
        }

        /* Page Content Area */
        .page-content {
            flex-grow: 1;
            overflow-y: auto; /* Enable scrolling for content */
            padding: 2.5rem; /* p-8 */
            background: transparent; /* Background diambil dari body */
        }

        /* WhatsApp Icon Specific Styles */
        .whatsapp-link {
            background-color: #25D366; /* WhatsApp green */
            color: var(--white);
            border-left: 5px solid #25D366; /* Green border for active look */
            margin-top: auto; /* Ini akan mendorongnya ke bawah secara otomatis jika di dalam flex container */
            margin-bottom: 0.5rem; /* Tambahkan sedikit jarak dari bawah jika perlu */
        }
        .whatsapp-link:hover {
            background-color: #1DA851; /* Darker green on hover */
            color: var(--white);
        }
        .whatsapp-link i {
            color: var(--white) !important; /* Ensure icon is white */
            width: 0.9rem; /* Ukuran ikon lebih kecil lagi */
            height: 0.9rem; /* Ukuran ikon lebih kecil lagi */
        }
        .whatsapp-link span {
            color: var(--white) !important; /* Ensure text is white */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                left: -250px; /* Hide sidebar by default */
                top: 0;
                bottom: 0;
                transition: left 0.3s ease-in-out;
            }
            .sidebar.active {
                left: 0; /* Show sidebar */
            }
            .main-content {
                margin-left: 0; /* No margin when sidebar is hidden */
            }
            .topbar {
                padding: 1rem 1.5rem;
            }
            .topbar-title {
                font-size: 1.5rem;
            }
            .profile-name {
                display: none; /* Hide name on smaller screens */
            }
            .page-content {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body class="bg-gray-50">

@auth
<div class="app-container">
    <aside class="sidebar">
        <div class="sidebar-header">
            <h1>SeblakMania</h1>
        </div>
        <nav class="sidebar-nav">
            <h2 class="nav-title">
                {{ auth()->user()->role === 'admin' ? 'Admin Panel' : 'Menu Pelanggan' }}
            </h2>
            <div class="space-y-2"> {{-- Tetap biarkan menu navigasi utama di sini --}}
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.products.index') }}"
                       class="nav-link {{ request()->routeIs('admin.products.*') ? 'active-link' : '' }}">
                        <i data-lucide="package"></i>
                        <span>Kelola Produk</span>
                    </a>
                    <a href="{{ route('admin.orders.index') }}"
                       class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active-link' : '' }}">
                        <i data-lucide="shopping-cart"></i>
                        <span>Kelola Pesanan</span>
                    </a>
                    <a href="{{ route('admin.reports.index') }}"
                       class="nav-link {{ request()->routeIs('admin.reports.*') ? 'active-link' : '' }}">
                        <i data-lucide="bar-chart-2"></i>
                        <span>Laporan Penjualan</span>
                    </a>
                     <a href="{{ route('profile.edit') }}"
                       class="nav-link {{ request()->routeIs('profile.edit') ? 'active-link' : '' }}">
                        <i data-lucide="user"></i>
                         <span>Profil Saya</span>
                    </a>
                @else
                    <a href="{{ route('customer.menu') }}"
                       class="nav-link {{ request()->routeIs('customer.menu') ? 'active-link' : '' }}">
                        <i data-lucide="utensils"></i>
                        <span>Menu Makanan</span>
                    </a>
                    <a href="{{ route('customer.orders') }}"
                       class="nav-link {{ request()->routeIs('customer.orders') ? 'active-link' : '' }}">
                        <i data-lucide="clipboard-list"></i>
                        <span>Pesanan Saya</span>
                    </a>
                    <a href="{{ route('customer.history.index') }}"
                       class="nav-link {{ request()->routeIs('customer.history.index') ? 'active-link' : '' }}">
                        <i data-lucide="history"></i>
                        <span>Riwayat</span>
                    </a>
                    <a href="{{ route('profile.edit') }}"
                       class="nav-link {{ request()->routeIs('profile.edit') ? 'active-link' : '' }}">
                        <i data-lucide="user"></i>
                         <span>Profil Saya</span>
                    </a>

                @endif
            </div>
            
            {{-- Pindahkan link WhatsApp keluar dari 'space-y-2' --}}
            @if(auth()->user()->role !== 'admin') {{-- Pastikan hanya untuk customer --}}
                <a href="https://wa.me/628970283052?text=Halo%20SeblakMania,%20saya%20punya%20pertanyaan%20tentang%20pesanan%20saya." 
                    target="_blank" 
                    class="nav-link whatsapp-link">
                    <i data-lucide="message-circle-more"></i> 
                    <span>Hubungi Kami (WA)</span>
                </a>
            @endif
        </nav>
        <div class="logout-section">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-button">
                    <i data-lucide="log-out"></i>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <div class="main-content">
        <header class="topbar">
            <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('customer.dashboard') }}"
               class="topbar-title">
                Dashboard
            </a>
            <div class="flex items-center space-x-4">
                <div class="profile-dropdown">
                    <button class="profile-button">
                        <img src="https://placehold.co/40x40/{{ str_replace('#','',substr(auth()->user()->name, 0, 1) === 'A' ? 'FF7043' : 'FFA726') }}/white?text={{ strtoupper(substr(auth()->user()->name, 0, 1)) }}" 
                             alt="Avatar" 
                             class="profile-avatar">
                        <span class="profile-name hidden md:block">{{ auth()->user()->name }}</span>
                    </button>
                </div>
            </div>
        </header>

        <main class="page-content">
            {{ $slot }}
        </main>
    </div>
</div>
@endauth

<script>
    lucide.createIcons();

    // Optional: Toggle sidebar for mobile view
    // Anda akan memerlukan ikon hamburger di topbar untuk memicu ini
    // const sidebar = document.querySelector('.sidebar');
    // const toggleBtn = document.querySelector('.mobile-toggle-btn'); // Asumsi Anda menambahkan tombol ini
    // if (toggleBtn) {
    //      toggleBtn.addEventListener('click', () => {
    //           sidebar.classList.toggle('active');
    //      });
    // }
</script>
</body>
</html>
