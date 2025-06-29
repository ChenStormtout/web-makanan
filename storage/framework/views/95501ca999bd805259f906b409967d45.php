<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Pastikan Tailwind CSS sudah terhubung, ini hanya untuk referensi kelas -->
        <script src="https://cdn.tailwindcss.com"></script>
        <!-- Google Fonts: Poppins (Utama) -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <!-- Lucide Icons -->
        <script src="https://unpkg.com/lucide@latest"></script>
        <style>
            /* --- Variabel CSS Global (Palet Warna Profesional dengan Dominasi Oranye) --- */
            :root {
                --bg-start-color: #ffe3c7;   /* rgb(255, 227, 199) - Warm cream (base for gradient) */
                --bg-end-color: #ededed;     /* rgb(237, 237, 237) - Light grey (base for gradient) */

                --primary-accent-color: #A36A00;   /* Darker, sophisticated orange-brown for highlights */
                --secondary-accent-color: #FF8C00; /* Bright orange, more dominant for headers */
                --secondary-accent-darker: #E07B00; /* Slightly darker bright orange for hover/active */
                
                --text-main: #333333;        /* Very dark grey for main text */
                --text-secondary: #666666;   /* Medium grey for secondary text */
                --text-light: #999999;       /* Light grey for less prominent text */
                --white: #FFFFFF;
                
                --border-light: #e0e0e0;     /* Light grey for borders */
                --card-bg: #FFFFFF;          /* White for cards/containers */
                
                --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.08);
                --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
                --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.15);

                /* Specific Colors for this page (Dominant Orange Adjustments) */
                --alert-success-bg: #e6ffe6;
                --alert-success-text: #28a745;
                --alert-success-border: #c3e6cb;

                /* Stat Card Icons - adjusted to orange theme */
                --stat-icon-bg-1: #FFEAD2; /* Lighter shade of primary accent */
                --stat-icon-color-1: var(--primary-accent-color); /* Primary accent */

                --stat-icon-bg-2: #FFF3E6; /* Very light orange/cream for a different stat */
                --stat-icon-color-2: #E07B00; /* A vibrant orange */

                --stat-icon-bg-3: #FFDDAA; /* Another light orange variant */
                --stat-icon-color-3: #CC6600; /* A strong orange */

                /* Activity icons - subtle complementary colors */
                --activity-icon-new-order: #7A42F4; /* A soft purple */
                --activity-icon-product-update: #28a745; /* A standard green */
                --activity-icon-new-user: var(--primary-accent-color); /* Primary orange accent */
            }

            /* --- Base Body Styling (Consistent with dashboard layout) --- */
            body {
                font-family: 'Poppins', sans-serif;
                background: linear-gradient(135deg, var(--bg-start-color) 0%, var(--bg-end-color) 100%);
                min-height: 100vh;
                color: var(--text-main);
                overflow-x: hidden;
            }

            /* Main content area padding (from x-app-layout's <main> tag) */
            .page-content-wrapper {
                padding: 2.5rem; /* p-6/p-8, ensure consistency with main x-app-layout content */
                max-width: 1200px; /* Max width for content */
                margin: auto; /* Center content */
                width: 100%;
            }

            /* --- Header Section --- */
            .header-section {
                margin-bottom: 2rem; /* mb-8 */
            }

            .page-heading {
                font-size: 2.2rem; /* text-3xl, adjusted */
                font-weight: 700; /* font-bold */
                color: var(--text-main); /* text-gray-800 */
                margin-bottom: 0.5rem;
            }

            .page-subheading {
                font-size: 1rem;
                color: var(--text-secondary); /* text-gray-500 */
                margin-top: 0.25rem; /* mt-1 */
            }

            /* --- Stats Cards Grid --- */
            .stats-grid {
                display: grid;
                grid-template-columns: repeat(1, 1fr); /* grid-cols-1 */
                gap: 1.5rem; /* gap-6 */
            }
            @media (min-width: 768px) { /* md breakpoint */
                .stats-grid {
                    grid-template-columns: repeat(2, 1fr); /* md:grid-cols-2 */
                }
            }
            @media (min-width: 1024px) { /* lg breakpoint */
                .stats-grid {
                    grid-template-columns: repeat(3, 1fr); /* lg:grid-cols-3 */
                }
            }

            .stat-card-link {
                display: block; /* block */
                background: var(--card-bg); /* bg-white */
                padding: 1.5rem; /* p-6 */
                border-radius: 1rem; /* rounded-xl */
                box-shadow: var(--shadow-sm); /* shadow-sm */
                border: 1px solid var(--border-light); /* border border-gray-200 */
                transition: all 0.2s ease-in-out;
            }

            .stat-card-link:hover {
                box-shadow: var(--shadow-md); /* hover:shadow-md */
                transform: translateY(-3px);
                border-color: var(--primary-accent-color); /* hover:border-orange-300 */
            }

            .stat-card-content {
                display: flex;
                align-items: center;
            }

            .stat-icon-wrapper {
                padding: 0.75rem; /* p-3 */
                border-radius: 0.5rem; /* rounded-lg */
                display: flex; /* flex */
                align-items: center;
                justify-content: center;
            }
            .stat-icon-wrapper i {
                width: 1.5rem; /* w-6 */
                height: 1.5rem; /* h-6 */
            }

            .stat-value-container {
                margin-left: 1rem; /* ml-4 */
            }
            .stat-label {
                font-size: 0.875rem; /* text-sm */
                font-weight: 500; /* font-medium */
                color: var(--text-secondary); /* text-gray-500 */
            }
            .stat-value {
                font-size: 1.5rem; /* text-2xl */
                font-weight: 700; /* font-bold */
                color: var(--text-main); /* text-gray-900 */
            }

            /* Specific stat icon colors (Orange Dominant) */
            .stat-icon-wrapper.total-products {
                background-color: var(--stat-icon-bg-1);
            }
            .stat-icon-wrapper.total-products i {
                color: var(--stat-icon-color-1);
            }

            .stat-icon-wrapper.orders-incoming {
                background-color: var(--stat-icon-bg-2);
            }
            .stat-icon-wrapper.orders-incoming i {
                color: var(--stat-icon-color-2);
            }

            .stat-icon-wrapper.total-sales {
                background-color: var(--stat-icon-bg-3);
            }
            .stat-icon-wrapper.total-sales i {
                color: var(--stat-icon-color-3);
            }

            /* --- Recent Activity Section --- */
            .recent-activity-section {
                margin-top: 2.5rem; /* mt-10 */
            }

            .activity-heading {
                font-size: 1.4rem; /* text-xl, slightly adjusted */
                font-weight: 600; /* font-bold */
                color: var(--text-main); /* text-gray-800 */
                margin-bottom: 1.25rem; /* mb-4 */
            }

            .activity-card {
                background: var(--card-bg); /* bg-white */
                border-radius: 1rem; /* rounded-xl */
                box-shadow: var(--shadow-sm); /* shadow-sm */
                border: 1px solid var(--border-light); /* border border-gray-200 */
                overflow: hidden; /* For rounded corners on list items */
            }

            .activity-list {
                list-style: none; /* Remove default list style */
                padding: 0;
                margin: 0;
                border-top: 1px solid var(--border-light); /* divide-y divide-gray-200 (first item border) */
            }
            .activity-list li:first-child {
                border-top: none; /* No top border for the very first item */
            }
            
            .activity-list-item {
                padding: 1rem 1.5rem; /* p-4, adjusted padding */
                display: flex;
                align-items: center;
                transition: background-color 0.15s ease-in-out; /* hover:bg-gray-50 */
                border-top: 1px solid var(--border-light); /* Ensures separation if no first-child rule */
            }

            .activity-list-item:hover {
                background-color: #f5f5f5; /* Light grey hover */
            }

            .activity-icon {
                width: 1.25rem; /* w-5 */
                height: 1.25rem; /* h-5 */
                margin-right: 1rem; /* mr-4 */
            }

            /* Activity specific icon colors */
            .activity-icon.new-order { color: var(--activity-icon-new-order); }
            .activity-icon.product-update { color: var(--activity-icon-product-update); }
            .activity-icon.new-user { color: var(--activity-icon-new-user); }

            .activity-text-container {
                flex-grow: 1; /* Take remaining space */
            }

            .activity-description {
                font-size: 0.95rem; /* text-sm, slightly adjusted */
                color: var(--text-main); /* text-gray-800 */
            }

            .activity-timestamp {
                font-size: 0.75rem; /* text-xs */
                color: var(--text-secondary); /* text-gray-500 */
                margin-top: 0.2rem;
            }

            /* --- Responsive Adjustments --- */
            @media (max-width: 1024px) {
                .page-content-wrapper {
                    padding: 2rem 1.5rem;
                }
                .page-heading {
                    font-size: 2rem;
                }
                .page-subheading {
                    font-size: 0.95rem;
                }
                .stat-card-link {
                    padding: 1.25rem;
                    border-radius: 0.75rem;
                }
                .stat-icon-wrapper i {
                    width: 1.25rem;
                    height: 1.25rem;
                }
                .stat-value {
                    font-size: 1.3rem;
                }
                .activity-heading {
                    font-size: 1.25rem;
                }
                .activity-list-item {
                    padding: 0.8rem 1.2rem;
                }
                .activity-icon {
                    width: 1rem;
                    height: 1rem;
                    margin-right: 0.8rem;
                }
                .activity-description {
                    font-size: 0.9rem;
                }
                .activity-timestamp {
                    font-size: 0.7rem;
                }
            }

            @media (max-width: 768px) {
                .page-content-wrapper {
                    padding: 1.5rem 1rem;
                }
                .page-heading {
                    font-size: 1.8rem;
                    margin-bottom: 0.8rem;
                }
                .page-subheading {
                    font-size: 0.85rem;
                }
                .stat-card-link {
                    padding: 1rem;
                    border-radius: 0.75rem;
                }
                .stat-icon-wrapper {
                    padding: 0.6rem;
                }
                .stat-icon-wrapper i {
                    width: 1.1rem;
                    height: 1.1rem;
                }
                .stat-value-container {
                    margin-left: 0.8rem;
                }
                .stat-label {
                    font-size: 0.8rem;
                }
                .stat-value {
                    font-size: 1.1rem;
                }
                .activity-heading {
                    font-size: 1.1rem;
                    margin-bottom: 1rem;
                }
                .activity-list-item {
                    padding: 0.7rem 1rem;
                }
                .activity-icon {
                    width: 0.9rem;
                    height: 0.9rem;
                    margin-right: 0.7rem;
                }
                .activity-description {
                    font-size: 0.8rem;
                }
                .activity-timestamp {
                    font-size: 0.65rem;
                }
            }
        </style>
    </head>
    <div class="page-content-wrapper">
        <!-- Header Section -->
        <div class="header-section">
            <div>
                <h1 class="page-heading">
                    Selamat Datang, <?php echo e(auth()->user()->name); ?>!
                </h1>
                <p class="page-subheading">Berikut adalah ringkasan aktivitas di toko Anda hari ini.</p>
            </div>
        </div>

        <!-- Stats Cards Grid -->
        <div class="stats-grid">
            <!-- Total Produk Card -->
            <a href="<?php echo e(route('admin.products.index')); ?>" class="stat-card-link">
                <div class="stat-card-content">
                    <div class="stat-icon-wrapper total-products">
                        <i data-lucide="package"></i>
                    </div>
                    <div class="stat-value-container">
                        <p class="stat-label">Total Produk</p>
                        <p class="stat-value"><?php echo e($totalProduk ?? 0); ?></p> 
                    </div>
                </div>
            </a>

            <!-- Pesanan Masuk Card -->
            <a href="<?php echo e(route('admin.orders.index')); ?>" class="stat-card-link">
                <div class="stat-card-content">
                    <div class="stat-icon-wrapper orders-incoming">
                        <i data-lucide="shopping-cart"></i>
                    </div>
                    <div class="stat-value-container">
                        <p class="stat-label">Pesanan Masuk</p>
                        <p class="stat-value"><?php echo e($totalPesanan ?? 0); ?></p> 
                    </div>
                </div>
            </a>

            <!-- Total Penjualan Card -->
            <a href="<?php echo e(route('admin.reports.index')); ?>" class="stat-card-link">
                <div class="stat-card-content">
                    <div class="stat-icon-wrapper total-sales">
                        <i data-lucide="wallet"></i>
                    </div>
                    <div class="stat-value-container">
                        <p class="stat-label">Total Penjualan</p>
                        <p class="stat-value">Rp <?php echo e(number_format($totalPenjualan ?? 0, 0, ',', '.')); ?></p> 
                    </div>
                </div>
            </a>
        </div>

        <!-- Recent Activity Section -->
        <div class="recent-activity-section">
            <h2 class="activity-heading">Aktivitas Terbaru</h2>
            <div class="activity-card">
                <ul class="activity-list">
                    
                    
                    <li class="activity-list-item">
                        <i data-lucide="receipt" class="activity-icon new-order"></i>
                        <div class="activity-text-container">
                            <p class="activity-description">Pesanan baru diterima dari <span class="font-semibold"><?php echo e('Customer A'); ?></span></p>
                            <p class="activity-timestamp"><?php echo e(now()->diffForHumans()); ?></p>
                        </div>
                    </li>
                    <li class="activity-list-item">
                        <i data-lucide="package-plus" class="activity-icon product-update"></i>
                        <div class="activity-text-container">
                            <p class="activity-description">Produk "<span class="font-semibold"><?php echo e('Seblak Spesial'); ?></span>" berhasil diperbarui</p>
                            <p class="activity-timestamp"><?php echo e(now()->subMinutes(10)->diffForHumans()); ?></p>
                        </div>
                    </li>
                    <li class="activity-list-item">
                        <i data-lucide="user-plus" class="activity-icon new-user"></i>
                        <div class="activity-text-container">
                            <p class="activity-description">Pengguna baru "<span class="font-semibold"><?php echo e('Budi'); ?></span>" telah mendaftar</p>
                            <p class="activity-timestamp"><?php echo e(now()->subHour()->diffForHumans()); ?></p>
                        </div>
                    </li>
                    <li class="activity-list-item">
                        <i data-lucide="check-circle" class="activity-icon product-update"></i>
                        <div class="activity-text-container">
                            <p class="activity-description">Pesanan <span class="font-semibold">#ORD12345</span> telah diselesaikan</p>
                            <p class="activity-timestamp"><?php echo e(now()->subHours(2)->diffForHumans()); ?></p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <script>
            lucide.createIcons(); // Pastikan ikon Lucide di-render setelah konten dimuat
        </script>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\LENOVO\web-makanan\resources\views/dashboard/admin.blade.php ENDPATH**/ ?>