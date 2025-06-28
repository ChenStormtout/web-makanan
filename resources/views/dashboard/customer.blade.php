<x-app-layout>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard SeblakMania</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://unpkg.com/lucide@latest"></script>
    </head>
    <style>
        :root {
            --primary-color:rgb(255, 150, 118); /* Oranye Kemerahan yang lebih lembut */
            --secondary-color: #FFA726; /* Oranye Cerah */
            --accent-color: #FFD54F; /* Kuning Keemasan */
            --text-dark: #2A363B; /* Abu-abu gelap elegan */
            --text-light: #5B6F7B; /* Abu-abu sedang */
            --white:rgb(255, 255, 255);
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
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="0.8" fill="rgba(255,255,255,0.05)"/><circle cx="80" cy="40" r="0.6" fill="rgba(255,255,255,0.04)"/><circle cx="40" cy="80" r="1" fill="rgba(255,255,255,0.03)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
            opacity: 0.7;
            z-index: 0;
        }

        /* Umum untuk kontainer layout aplikasi */
        .py-12 { padding-top: 3rem; padding-bottom: 3rem; }
        .max-w-7xl { max-width: 80rem; }
        .mx-auto { margin-left: auto; margin-right: auto; }
        .sm:px-6 { padding-left: 1.5rem; padding-right: 1.5rem; }
        .lg:px-8 { padding-left: 2rem; padding-right: 2rem; }

        /* Welcome Section */
        .welcome-section {
            margin-bottom: 3rem; /* mb-12 */
            padding-top: 1.5rem; /* pt-6 */
            padding-bottom: 2rem; /* pb-8 */
            text-align: left; /* Rata kiri */
            z-index: 1; /* Pastikan di atas efek grain */
            position: relative;
        }

        .welcome-section h1 {
            font-family: 'Playfair Display', serif; /* Font judul */
            font-size: clamp(2.5rem, 5vw, 3.5rem); /* Ukuran responsif */
            font-weight: 700; /* font-semibold */
            color: var(--white); /* text-gray-900 diubah ke putih */
            line-height: 1.2; /* leading-tight */
            margin-bottom: 0.5rem; /* mb-2 */
            text-shadow: 2px 3px 6px rgba(0, 0, 0, 0.4); /* Bayangan teks */
        }

        .welcome-section h1 .username {
            color: var(--primary-color); /* text-orange-500 diubah ke primary-color */
            font-weight: 700;
            display: inline-block; /* Agar bisa menerapkan efek pada span */
            animation: shimmer 3.5s ease-in-out infinite alternate;
        }

        @keyframes shimmer {
            0%, 100% { filter: brightness(1); }
            50% { filter: brightness(1.2); }
        }

        .welcome-section p {
            font-size: 1.125rem; /* text-lg */
            color: rgba(86, 86, 86, 0.9); /* text-gray-600 diubah ke putih transparan */
            font-weight: 300;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: 1fr; /* Default 1 column */
            gap: 1.5rem; /* gap-6 */
            margin-bottom: 4rem; /* mb-16 */
            z-index: 1;
            position: relative;
        }

        @media (min-width: 768px) { /* md breakpoint */
            .stats-grid {
                grid-template-columns: repeat(2, 1fr); /* md:grid-cols-2 */
            }
        }

        .stat-card {
            background: rgba(255, 255, 255, var(--card-bg-opacity)); /* Glassmorphism background */
            backdrop-filter: blur(20px); /* Efek blur */
            border-radius: 1.5rem; /* rounded-xl */
            border: 1px solid rgba(255, 255, 255, var(--border-opacity)); /* border-gray-200 */
            padding: 2.5rem; /* p-6, ditingkatkan */
            box-shadow: var(--shadow-light); /* hover:shadow-md diubah ke shadow-light */
            transition: all 0.3s ease; /* transition-shadow duration-200 */
        }

        .stat-card:hover {
            box-shadow: var(--shadow-medium); /* Efek hover bayangan lebih kuat */
            transform: translateY(-5px); /* Sedikit naik */
        }

        .stat-card .flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem; /* Jarak icon dan angka */
        }

        .stat-card p.title {
            font-size: 0.95rem; /* text-sm */
            font-weight: 500; /* font-medium */
            color: var(--text-light); /* text-gray-500 */
            margin-bottom: 0.25rem; /* mb-1 */
        }

        .stat-card p.value {
            font-family: 'Playfair Display', serif; /* Font angka */
            font-size: 2.8rem; /* text-3xl ditingkatkan */
            font-weight: 700; /* font-semibold */
            color: var(--text-dark); /* text-gray-900 */
        }

        .stat-icon-wrapper {
            width: 3.5rem; /* w-12 ditingkatkan */
            height: 3.5rem; /* h-12 ditingkatkan */
            border-radius: 0.75rem; /* rounded-lg */
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-light);
        }

        .stat-card.pending .stat-icon-wrapper {
            background: rgba(var(--primary-color), 0.1); /* bg-blue-50 diubah ke warna tema */
        }
        .stat-card.pending .stat-icon-wrapper svg {
            color: var(--primary-color); /* text-blue-600 diubah ke primary-color */
        }

        .stat-card.completed .stat-icon-wrapper {
            background: rgba(0, 128, 0, 0.1); /* Background hijau untuk completed */
        }
        .stat-card.completed .stat-icon-wrapper svg {
            color: #008000; /* Warna hijau untuk completed */
        }

        .stat-card .view-link {
            display: inline-flex;
            align-items: center;
            font-size: 0.9rem; /* text-sm */
            color: var(--text-dark); /* Warna link */
            font-weight: 500; /* font-medium */
            margin-top: 1rem; /* mt-4 */
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .stat-card .view-link:hover {
            color: var(--primary-color); /* Warna hover link */
            text-decoration: underline;
        }

        .stat-card .view-link svg {
            width: 1rem; /* w-4 */
            height: 1rem; /* h-4 */
            margin-left: 0.25rem; /* ml-1 */
        }

        /* Product Sections */
        .product-section {
            margin-bottom: 4rem; /* mb-16 */
            z-index: 1;
            position: relative;
        }

        .product-section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem; /* mb-8 */
        }

        .product-section-header h2 {
            font-family: 'Playfair Display', serif; /* Font judul */
            font-size: 2rem; /* text-2xl */
            font-weight: 700; /* font-semibold */
            color: var(--text-dark); /* text-gray-900 */
        }

        .product-section-header .divider {
            width: 2rem; /* w-8 */
            height: 0.125rem; /* h-0.5 */
            background: var(--primary-color); /* bg-orange-500 diubah ke primary-color */
            border-radius: 9999px; /* rounded-full */
        }
        
        .product-section.drinks .product-section-header .divider {
            background: #008000; /* Divider hijau untuk minuman */
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* Grid lebih responsif */
            gap: 1.5rem; /* gap-6 */
        }

        .product-card {
            background: rgba(255, 255, 255, var(--card-bg-opacity)); /* Glassmorphism background */
            backdrop-filter: blur(15px); /* Efek blur lebih ringan untuk produk */
            border-radius: 1.5rem; /* rounded-xl */
            border: 1px solid rgba(255, 255, 255, var(--border-opacity)); /* border-gray-200 */
            overflow: hidden;
            box-shadow: var(--shadow-light); /* hover:shadow-lg */
            transition: all 0.3s ease;
            position: relative;
        }

        .product-card:hover {
            box-shadow: var(--shadow-medium);
            transform: translateY(-8px); /* Sedikit naik saat hover */
        }

        .product-card-image {
            aspect-ratio: 1 / 1; /* aspect-square */
            overflow: hidden;
            border-bottom: 1px solid rgba(255, 255, 255, var(--border-opacity)); /* Border bawah gambar */
            background-color: #f0f0f0; /* Fallback background */
        }

        .product-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease; /* group-hover:scale-105 duration-300 */
            filter: brightness(0.98); /* Sedikit gelap */
        }

        .product-card:hover .product-card-image img {
            transform: scale(1.08); /* Efek zoom in lebih kuat */
            filter: brightness(1); /* Kembali normal saat hover */
        }

        .product-card-content {
            padding: 1.75rem; /* p-5 ditingkatkan */
        }

        .product-card-content h3 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600; /* font-medium */
            color: var(--text-dark); /* text-gray-900 */
            margin-bottom: 0.5rem; /* mb-2 */
            line-height: 1.4; /* line-clamp-2 */
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-card-content p.description {
            font-size: 0.9rem; /* text-sm */
            color: var(--text-light); /* text-gray-600 */
            margin-bottom: 1rem; /* mb-4 */
            line-height: 1.5; /* line-clamp-2 */
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-card-price {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1rem; /* mb-4 */
        }

        .product-card-price span {
            font-family: 'Playfair Display', serif; /* Font harga */
            font-size: 1.4rem; /* text-lg ditingkatkan */
            font-weight: 700; /* font-semibold */
            color: var(--text-dark); /* text-gray-900 */
        }

        .add-to-cart-button {
            width: 100%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)); /* bg-orange-500 diubah ke gradien tema */
            color: var(--white);
            padding: 0.85rem 1.25rem; /* py-2.5 px-4 */
            border-radius: 0.75rem; /* rounded-lg */
            font-weight: 600; /* font-medium */
            font-size: 0.9rem; /* text-sm */
            border: none;
            cursor: pointer;
            transition: all 0.3s ease; /* transition-colors duration-200 */
            box-shadow: var(--shadow-light);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .add-to-cart-button:hover {
            filter: brightness(1.1); /* Efek cerah saat hover */
            box-shadow: var(--shadow-medium);
            transform: translateY(-2px);
        }

        .drinks .add-to-cart-button {
            background: linear-gradient(135deg, #008000, #3CB371); /* Gradien hijau untuk minuman */
        }

        .empty-state {
            grid-column: 1 / -1; /* col-span-full */
            text-align: center;
            padding: 3rem; /* py-12 */
            background: rgba(255, 255, 255, var(--card-bg-opacity)); /* Glassmorphism background */
            backdrop-filter: blur(15px);
            border-radius: 1.5rem; /* rounded-xl */
            border: 1px solid rgba(255, 255, 255, var(--border-opacity));
            box-shadow: var(--shadow-light);
            transition: all 0.3s ease;
        }

        .empty-state svg {
            width: 3rem; /* w-12 */
            height: 3rem; /* h-12 */
            color: var(--text-light); /* text-gray-400 */
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 1rem; /* mb-4 */
        }

        .empty-state p.title {
            color: var(--text-dark); /* text-gray-600 */
            font-weight: 600; /* font-medium */
            margin-bottom: 0.25rem;
        }

        .empty-state p.subtitle {
            color: var(--text-light); /* text-gray-500 */
            font-size: 0.9rem; /* text-sm */
            margin-top: 0.25rem; /* mt-1 */
        }

        /* Responsive Adjustments */
        @media (max-width: 1024px) { /* lg breakpoint */
            .products-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }
        }

        @media (max-width: 768px) { /* md breakpoint */
            .welcome-section h1 {
                font-size: clamp(2rem, 6vw, 2.8rem);
            }
            .welcome-section p {
                font-size: 1rem;
            }
            .stat-card {
                padding: 2rem;
            }
            .stat-card p.value {
                font-size: 2.5rem;
            }
            .stat-icon-wrapper {
                width: 3rem;
                height: 3rem;
            }
            .product-card {
                padding: 1.25rem;
            }
            .product-card-content h3 {
                font-size: 1.1rem;
            }
            .product-card-price span {
                font-size: 1.2rem;
            }
            .add-to-cart-button {
                font-size: 0.85rem;
                padding: 0.75rem 1rem;
            }
        }

        @media (max-width: 640px) { /* sm breakpoint */
            .products-grid {
                grid-template-columns: 1fr; /* Single column on small screens */
            }
        }

        @media (max-width: 480px) {
            .welcome-section {
                margin-bottom: 2rem;
                padding-top: 1rem;
                padding-bottom: 1.5rem;
                text-align: center;
            }
            .welcome-section h1 {
                font-size: clamp(1.8rem, 7vw, 2.5rem);
            }
            .welcome-section p {
                font-size: 0.9rem;
            }
            .stats-grid {
                margin-bottom: 3rem;
            }
            .stat-card {
                padding: 1.5rem;
            }
            .stat-card p.value {
                font-size: 2.2rem;
            }
            .stat-icon-wrapper {
                width: 2.5rem;
                height: 2.5rem;
            }
            .stat-card .view-link {
                font-size: 0.8rem;
            }
            .product-section {
                margin-bottom: 3rem;
            }
            .product-section-header {
                flex-direction: column; /* Stack header elements */
                align-items: flex-start; /* Align to start */
                margin-bottom: 1.5rem;
            }
            .product-section-header h2 {
                font-size: 1.8rem;
                margin-bottom: 0.5rem;
            }
            .product-section-header .divider {
                align-self: flex-start; /* Align divider with title */
            }
            .product-card-content {
                padding: 1rem;
            }
            .product-card-content h3 {
                font-size: 1rem;
            }
            .product-card-content p.description {
                font-size: 0.85rem;
            }
            .product-card-price span {
                font-size: 1.1rem;
            }
            .empty-state {
                padding: 2rem;
            }
            .empty-state svg {
                width: 2.5rem;
                height: 2.5rem;
            }
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="welcome-section">
                <h1>
                    Selamat Datang, <span class="username">{{ Auth::user()->name }}</span>!
                </h1>
                <p>
                    Ringkasan performa dan rekomendasi untuk Anda hari ini.
                </p>lihat
            </div>

            <div class="stats-grid">
                <div class="stat-card pending">
                    <div class="flex">
                        <div>
                            <p class="title">Pesanan Menunggu</p>
                            <p class="value">{{ $pendingOrdersCount ?? 'N/A' }}</p>
                        </div>
                        <div class="stat-icon-wrapper">
                            <i data-lucide="truck" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <a href="{{ route('customer.orders') }}" class="view-link">
                        Lihat semua <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
                    </a>
                </div>

                <div class="stat-card completed">
                    <div class="flex">
                        <div>
                            <p class="title">Berhasil Bulan Ini</p>
                            <p class="value">{{ $completedOrdersCount ?? 'N/A' }}</p>
                        </div>
                        <div class="stat-icon-wrapper">
                            <i data-lucide="check-circle-2" class="w-6 h-6"></i>
                        </div>
                    </div>
                    <a href="{{ route('customer.history.index') }}" class="view-link">
                        Lihat riwayat <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
                    </a>
                </div>
            </div>

            <div class="product-section foods">
                <div class="product-section-header">
                    <h2>Pilihan Makanan</h2>
                    <div class="divider"></div>
                </div>
                
                <div class="products-grid">
                    @forelse ($makanan as $product)
                        <div class="product-card">
                            <div class="product-card-image">
                                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/400x400/f8f9fa/6c757d?text=Food' }}"
                                     alt="{{ $product->name }}"
                                     loading="lazy">
                            </div>
                            
                            <div class="product-card-content">
                                <h3>{{ $product->name }}</h3>
                                <p class="description">
                                    {{ $product->description ?? 'Hidangan lezat dengan bahan berkualitas.' }}
                                </p>
                                
                                <div class="product-card-price">
                                    <span>
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </span>
                                </div>

                                <form action="{{ route('customer.cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="add-to-cart-button">
                                        Tambah ke Keranjang
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <i data-lucide="coffee" class="w-12 h-12"></i>
                            <p class="title">Belum ada makanan tersedia</p>
                            <p class="subtitle">Silakan cek kembali nanti</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="product-section drinks">
                <div class="product-section-header">
                    <h2>Pilihan Minuman</h2>
                    <div class="divider"></div>
                </div>
                
                <div class="products-grid">
                    @forelse ($minuman as $product)
                        <div class="product-card">
                            <div class="product-card-image">
                                <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://placehold.co/400x400/f8f9fa/6c757d?text=Drink' }}"
                                     alt="{{ $product->name }}"
                                     loading="lazy">
                            </div>
                            
                            <div class="product-card-content">
                                <h3>{{ $product->name }}</h3>
                                <p class="description">
                                    {{ $product->description ?? 'Minuman segar untuk menemani hari Anda.' }}
                                </p>
                                
                                <div class="product-card-price">
                                    <span>
                                        Rp {{ number_format($product->price, 0, ',', '.') }}
                                    </span>
                                </div>

                                <form action="{{ route('customer.cart.add', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="add-to-cart-button">
                                        Tambah ke Keranjang
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <i data-lucide="coffee" class="w-12 h-12"></i>
                            <p class="title">Belum ada minuman tersedia</p>
                            <p class="subtitle">Silakan cek kembali nanti</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <script>
        lucide.createIcons();
    </script>
</x-app-layout>