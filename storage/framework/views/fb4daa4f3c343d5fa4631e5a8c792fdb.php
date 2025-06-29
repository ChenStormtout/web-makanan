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
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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

                /* Category Badge - now more prominent orange */
                --category-badge-bg: #FFEAD2; /* Very light orange, almost cream */
                --category-badge-text: var(--primary-accent-color); /* Darker orange text */
                --category-badge-border: #FFDDAA; /* Slightly deeper light orange border */

                /* Stat Card Icons - adjusted to orange theme */
                --stat-icon-bg-1: #FFEAD2; /* Lighter shade of primary accent */
                --stat-icon-color-1: var(--primary-accent-color); /* Primary accent */

                --stat-icon-bg-2: #FFF3E6; /* Very light orange/cream for a different stat */
                --stat-icon-color-2: #E07B00; /* A vibrant orange */

                --stat-icon-bg-3: #FFDDAA; /* Another light orange variant */
                --stat-icon-color-3: #CC6600; /* A strong orange */
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
                display: flex;
                flex-direction: column;
                margin-bottom: 2rem; /* mb-8 */
            }
            @media (min-width: 640px) { /* sm breakpoint */
                .header-section {
                    flex-direction: row;
                    justify-content: space-between;
                    align-items: center;
                    gap: 1rem; /* gap-4 */
                }
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

            /* --- Add Product Button --- */
            .add-product-button {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 0.75rem 1.5rem; /* px-6 py-3 */
                background-color: var(--primary-accent-color); /* bg-orange-500 */
                color: var(--white); /* text-white */
                font-weight: 600; /* font-semibold */
                border-radius: 0.5rem; /* rounded-lg */
                box-shadow: var(--shadow-md); /* shadow-md */
                transition: all 0.2s ease-in-out;
                text-decoration: none;
            }

            .add-product-button:hover {
                background-color: #8C5C00; /* darker primary accent */
                transform: translateY(-2px); /* hover:-translate-y-0.5 */
                box-shadow: var(--shadow-lg); /* stronger shadow on hover */
            }

            .add-product-button i {
                width: 1.25rem; /* w-5 */
                height: 1.25rem; /* h-5 */
                margin-right: 0.5rem; /* mr-2 */
            }

            /* --- Success Alert --- */
            .alert-success-container {
                background-color: var(--alert-success-bg); /* bg-green-100 */
                border-left: 0.25rem solid var(--alert-success-border); /* border-l-4 border-green-500 */
                color: var(--alert-success-text); /* text-green-700 */
                padding: 1rem; /* p-4 */
                border-radius: 0.5rem; /* rounded-lg */
                margin-bottom: 1.5rem; /* mb-6 */
                box-shadow: var(--shadow-sm); /* subtle shadow */
            }
            .alert-success-container .flex {
                display: flex;
                align-items: center;
            }
            .alert-success-container i {
                width: 1.25rem; /* w-5 */
                height: 1.25rem; /* h-5 */
                margin-right: 0.75rem; /* mr-3 */
            }
            .alert-success-container p {
                font-weight: 700; /* font-bold */
            }

            /* --- Products Table Card --- */
            .products-table-card {
                background: var(--card-bg); /* bg-white */
                border-radius: 1rem; /* rounded-xl */
                box-shadow: var(--shadow-md); /* shadow-sm */
                overflow: hidden;
                border: 1px solid var(--border-light); /* border border-gray-200 */
            }

            .products-table-card .overflow-x-auto {
                overflow-x: auto;
            }

            .custom-table {
                min-width: 100%;
                font-size: 0.9rem; /* text-sm */
                color: var(--text-main);
                border-collapse: separate;
                border-spacing: 0;
            }

            /* --- Table Header (More Orange) --- */
            .custom-table thead {
                background-color: var(--secondary-accent-color); /* Previously purple, now bright orange */
            }

            .custom-table thead tr {
                color: var(--white);
            }

            .custom-table th {
                padding: 1rem 1.25rem; /* px-6 py-4 */
                text-align: left;
                font-weight: 600; /* font-semibold */
                letter-spacing: 0.05em; /* tracking-wider */
                text-transform: uppercase;
            }

            /* Apply border-radius to specific header cells */
            .custom-table thead tr th:first-child {
                border-top-left-radius: 0.75rem;
            }

            .custom-table thead tr th:last-child {
                border-top-right-radius: 0.75rem;
            }

            /* --- Table Body --- */
            .custom-table tbody tr {
                border-bottom: 1px solid var(--border-light); /* divide-y divide-gray-200 */
                transition: background-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }
            .custom-table tbody tr:last-child {
                border-bottom: none; /* Remove border from the last row */
            }
            .custom-table tbody tr:nth-child(odd) {
                background-color: var(--white); /* Putih solid untuk ganjil */
            }
            .custom-table tbody tr:nth-child(even) {
                background-color: #f9f9f9; /* Abu-abu sangat terang untuk genap */
            }
            .custom-table tbody tr:hover {
                background-color: #f0f0f0; /* hover:bg-gray-50 */
                box-shadow: var(--shadow-sm); /* Add subtle shadow on hover */
            }

            /* --- Table Cell Styling --- */
            .custom-table td {
                padding: 1rem 1.25rem; /* px-6 py-4 */
                vertical-align: middle; /* Align content to middle */
                color: var(--text-secondary); /* Default text color for cells */
                white-space: nowrap; /* whitespace-nowrap */
            }

            .product-name-cell .font-medium {
                color: var(--text-main); /* text-gray-900 */
            }
            .product-name-cell .text-xs {
                color: var(--text-light); /* text-gray-500 */
            }

            /* Category Badge (Orange Dominant) */
            .category-badge {
                display: inline-flex;
                align-items: center;
                padding: 0.4rem 0.8rem; /* px-2.5 py-0.5 */
                border-radius: 9999px; /* rounded-full */
                font-size: 0.75rem; /* text-xs */
                font-weight: 500; /* font-medium */
                background-color: var(--category-badge-bg); /* bg-orange-100 */
                color: var(--category-badge-text); /* text-orange-800 */
                border: 1px solid var(--category-badge-border);
                text-transform: capitalize;
            }

            .product-price-cell .font-semibold {
                color:rgb(84, 78, 78); /* text-gray-800, changed to green for price */
            }

            /* Product Image */
            .product-image {
                width: 4rem; /* w-16 */
                height: 4rem; /* h-16 */
                object-fit: cover;
                border-radius: 0.5rem; /* rounded-md */
                border: 1px solid var(--border-light); /* border border-gray-200 */
            }
            .no-image-placeholder {
                width: 4rem;
                height: 4rem;
                background-color: #f5f5f5; /* bg-gray-100 */
                border-radius: 0.5rem;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 0.75rem; /* text-xs */
                color: var(--text-light); /* text-gray-400 */
                border: 1px dashed var(--border-light); /* border border-dashed */
            }

            /* --- Action Buttons (Table Row) --- */
            .action-buttons-group {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 0.5rem; /* gap-2 */
            }
            .action-button-icon {
                padding: 0.5rem; /* p-2 */
                color: var(--text-secondary); /* text-gray-500 */
                border-radius: 0.375rem; /* rounded-md */
                transition: all 0.15s ease-in-out; /* transition-colors */
                display: inline-flex;
                align-items: center;
                justify-content: center;
            }
            .action-button-icon i {
                width: 1rem; /* w-4 */
                height: 1rem; /* h-4 */
            }

            .action-button-icon.edit:hover {
                color: var(--primary-accent-color); /* hover:text-orange-600 */
                background-color: #ffe3c7; /* hover:bg-orange-100 */
            }
            .action-button-icon.delete:hover {
                color: #dc3545; /* hover:text-red-600 */
                background-color: #ffe6e6; /* hover:bg-red-100 */
            }

            /* --- Empty State --- */
            .empty-state-cell {
                padding: 4rem 1.5rem; /* px-6 py-16 */
            }
            .empty-state-content {
                display: flex;
                flex-direction: column;
                align-items: center;
                color: var(--text-secondary); /* text-gray-500 */
            }
            .empty-state-icon {
                width: 3rem; /* w-12 */
                height: 3rem; /* h-12 */
                color: var(--text-light); /* text-gray-300 */
                margin-bottom: 1rem; /* mb-4 */
            }
            .empty-state-title {
                font-size: 1.1rem; /* text-lg */
                font-weight: 600; /* font-semibold */
                color: var(--text-main); /* text-gray-700 */
            }
            .empty-state-text {
                font-size: 0.9rem;
                margin-top: 0.25rem; /* mt-1 */
            }

            /* --- Stats Cards --- */
            .stats-grid {
                margin-top: 2rem; /* mt-8 */
                display: grid;
                grid-template-columns: repeat(1, 1fr); /* grid-cols-1 */
                gap: 1.5rem; /* gap-6 */
            }
            @media (min-width: 768px) { /* md breakpoint */
                .stats-grid {
                    grid-template-columns: repeat(3, 1fr); /* md:grid-cols-3 */
                }
            }

            .stat-card {
                background: var(--card-bg); /* bg-white */
                padding: 1.5rem; /* p-6 */
                border-radius: 1rem; /* rounded-xl */
                box-shadow: var(--shadow-sm); /* shadow-sm */
                border: 1px solid var(--border-light); /* border border-gray-200 */
                display: flex;
                align-items: center;
            }

            .stat-icon-wrapper {
                padding: 0.75rem; /* p-3 */
                border-radius: 0.5rem; /* rounded-lg */
                display: flex; /* Ensure centering */
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

            .stat-icon-wrapper.avg-price {
                background-color: var(--stat-icon-bg-2);
            }
            .stat-icon-wrapper.avg-price i {
                color: var(--stat-icon-color-2);
            }

            .stat-icon-wrapper.active-categories {
                background-color: var(--stat-icon-bg-3);
            }
            .stat-icon-wrapper.active-categories i {
                color: var(--stat-icon-color-3);
            }
        </style>
    </head>
    <div class="page-content-wrapper">
        <div class="header-section">
            <div>
                <h1 class="page-heading">Kelola Produk</h1>
                <p class="page-subheading">Manajemen daftar produk untuk toko Anda.</p>
            </div>
            <a href="<?php echo e(route('admin.products.create')); ?>" class="add-product-button">
                <i data-lucide="plus"></i>
                <span>Tambah Produk</span>
            </a>
        </div>

        <?php if(session('success')): ?>
            <div class="alert-success-container" role="alert">
                <div class="flex items-center">
                    <i data-lucide="check-circle"></i>
                    <p><?php echo e(session('success')); ?></p>
                </div>
            </div>
        <?php endif; ?>

        <div class="products-table-card">
            <div class="overflow-x-auto">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="<?php echo e($loop->odd ? 'odd-row' : 'even-row'); ?>">
                                <td class="product-name-cell">
                                    <div class="font-medium"><?php echo e($product->name); ?></div>
                                    <div class="text-xs mt-1"><?php echo e(Str::limit($product->description, 50)); ?></div>
                                </td>
                                <td>
                                    <span class="category-badge">
                                        <?php echo e($product->category->name); ?>

                                    </span>
                                </td>
                                <td class="product-price-cell">
                                    <div class="font-semibold">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></div>
                                </td>
                                <td>
                                    <?php if($product->image): ?>
                                        <img src="<?php echo e(asset('storage/'.$product->image)); ?>"
                                            alt="<?php echo e($product->name); ?>"
                                            class="product-image"
                                            onerror="this.src='https://placehold.co/64x64/EEE/AAA?text=Img'; this.onerror=null;" />
                                    <?php else: ?>
                                        <div class="no-image-placeholder">
                                            No Image
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="action-buttons-group">
                                        <a href="<?php echo e(route('admin.products.edit', $product)); ?>" class="action-button-icon edit">
                                            <i data-lucide="edit"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.products.destroy', $product)); ?>"
                                            method="POST" 
                                            onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="action-button-icon delete">
                                                <i data-lucide="trash-2"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="empty-state-cell">
                                    <div class="empty-state-content">
                                        <i data-lucide="package-search" class="empty-state-icon"></i>
                                        <h3 class="empty-state-title">Belum Ada Produk</h3>
                                        <p class="empty-state-text">Silakan tambahkan produk pertama Anda.</p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php if($products->count() > 0): ?>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon-wrapper total-products">
                        <i data-lucide="package"></i>
                    </div>
                    <div class="stat-value-container">
                        <p class="stat-label">Total Produk</p>
                        <p class="stat-value"><?php echo e($products->count()); ?></p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon-wrapper avg-price">
                        <i data-lucide="wallet"></i>
                    </div>
                    <div class="stat-value-container">
                        <p class="stat-label">Rata-rata Harga</p>
                        <p class="stat-value">Rp <?php echo e(number_format($products->avg('price'), 0, ',', '.')); ?></p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon-wrapper active-categories">
                        <i data-lucide="tag"></i>
                    </div>
                    <div class="stat-value-container">
                        <p class="stat-label">Kategori Aktif</p>
                        <p class="stat-value"><?php echo e($products->pluck('category_id')->unique()->count()); ?></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        
        <script>
            lucide.createIcons();
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
<?php endif; ?><?php /**PATH C:\Users\LENOVO\web-makanan\resources\views/admin/products/index.blade.php ENDPATH**/ ?>