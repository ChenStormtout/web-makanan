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
            /* --- Variabel CSS Global (Palet Warna Profesional) --- */
            :root {
                --bg-start-color: #ffe3c7;   /* rgb(255, 227, 199) - Warm cream */
                --bg-end-color: #ededed;     /* rgb(237, 237, 237) - Light grey */

                --primary-accent-color: #A36A00;   /* Darker, sophisticated orange-brown for highlights */
                --secondary-accent-color: #FF8C00; /* Bright orange, more dominant for headers */
                --secondary-accent-darker: #E07B00; /* Slightly darker bright orange for hover/active */
                
                --text-main: #333333;         /* Very dark grey for main text */
                --text-secondary: #666666;   /* Medium grey for secondary text */
                --text-light: #999999;       /* Light grey for less prominent text */
                --white: #FFFFFF;
                
                --border-light: #e0e0e0;     /* Light grey for borders */
                --card-bg: #FFFFFF;           /* White for cards/containers */
                
                --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.08);
                --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
                --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.15);

                /* Status badge colors - Adjusted for orange theme dominance */
                --status-pending-bg: #ffe3c7; /* Lighter shade of primary-accent */
                --status-pending-text: var(--primary-accent-color);
                --status-pending-border: #ffd5a8;

                --status-processing-bg: #fffbe6; /* Light yellow for processing */
                --status-processing-text: #e07b00; /* Darker orange for processing */
                --status-processing-border: #ffe7b3;

                --status-done-bg: #e6ffe6; /* Light green for done */
                --status-done-text: #28a745; /* Green for done */
                --status-done-border: #c3e6cb;

                --status-cancelled-bg: #ffe6e6; /* Light red for cancelled */
                --status-cancelled-text: #dc3545; /* Red for cancelled */
                --status-cancelled-border: #ffb3b3;

                /* For any other status, or if no specific class is matched */
                --status-default-bg: #ededed; 
                --status-default-text: var(--text-secondary);
                --status-default-border: var(--border-light);
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
            .page-heading-container {
                margin-bottom: 2rem; /* mb-8 */
                text-align: left;
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

            /* --- Orders Table Container --- */
            .orders-table-wrapper {
                background: var(--card-bg); /* bg-white */
                border-radius: 1rem; /* rounded-xl */
                box-shadow: var(--shadow-md); /* shadow-sm */
                overflow: hidden;
                border: 1px solid var(--border-light); /* border border-gray-200 */
            }

            .orders-table-wrapper .overflow-x-auto {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch; /* for smoother scrolling on mobile */
            }

            .custom-table {
                min-width: 100%;
                font-size: 0.9rem; /* text-sm */
                color: var(--text-main);
                border-collapse: separate;
                border-spacing: 0; /* Remove default spacing for border-collapse */
            }

            /* --- Table Header --- */
            .custom-table thead {
                background-color: var(--secondary-accent-color); /* bg-gray-50 -> changed to accent color */
                color: var(--white); /* text-gray-600 -> changed to white for contrast */
            }

            .custom-table th {
                padding: 1rem 1.25rem; /* px-6 py-4 */
                text-align: left;
                font-weight: 600; /* font-semibold */
                text-transform: uppercase;
                letter-spacing: 0.05em;
            }

            /* Apply border-radius to specific header cells for rounded table top */
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
                background-color: var(--white); /* White solid for odd rows */
            }
            .custom-table tbody tr:nth-child(even) {
                background-color: #fcfcfc; /* Very light grey for even rows */
            }
            .custom-table tbody tr:hover {
                background-color: #fef8ee; /* A very light orange tint on hover */
                box-shadow: var(--shadow-sm); /* Add subtle shadow on hover */
            }

            /* --- Table Cell Styling --- */
            .custom-table td {
                padding: 1rem 1.25rem; /* px-6 py-4 */
                vertical-align: middle; /* Align content to middle */
                color: var(--text-secondary); /* Default text color for cells */
            }

            .order-id-cell {
                font-family: monospace; /* font-mono */
                font-size: 0.75rem; /* text-xs */
                color: var(--text-light); /* text-gray-500 */
            }

            .customer-name-cell {
                color: var(--text-main); /* text-gray-800 */
            }

            .total-price-cell {
                font-weight: 700; /* font-semibold */
                color: #28a745; /* Consistent green for positive values */
            }

            .date-cell {
                color: var(--text-secondary); /* text-gray-600 */
            }

            /* --- Status Badge Styling --- */
            .status-badge {
                display: inline-flex;
                padding: 0.4rem 0.8rem; /* px-2.5 py-0.5 */
                border-radius: 0.5rem; /* rounded-full */
                font-size: 0.75rem; /* text-xs */
                font-weight: 600; /* font-medium */
                text-transform: capitalize;
                white-space: nowrap; /* Prevent text wrapping */
                border: 1px solid;
            }

            .status-pending {
                background-color: var(--status-pending-bg);
                color: var(--status-pending-text);
                border-color: var(--status-pending-border);
            }
            .status-processing {
                background-color: var(--status-processing-bg);
                color: var(--status-processing-text);
                border-color: var(--status-processing-border);
            }
            .status-done {
                background-color: var(--status-done-bg);
                color: var(--status-done-text);
                border-color: var(--status-done-border);
            }
            .status-cancelled {
                background-color: var(--status-cancelled-bg);
                color: var(--status-cancelled-text);
                border-color: var(--status-cancelled-border);
            }
            .status-default {
                background-color: var(--status-default-bg);
                color: var(--status-default-text);
                border-color: var(--status-default-border);
            }

            /* --- Action Button (Lihat Detail) --- */
            .action-button {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 0.5rem; /* p-2 */
                color: var(--text-light); /* text-gray-500 */
                border-radius: 0.375rem; /* rounded-md */
                transition: all 0.15s ease-in-out;
            }

            .action-button:hover {
                color: var(--primary-accent-color); /* hover:text-orange-600 */
                background-color: #fff4e6; /* hover:bg-orange-100 (lighter primary accent) */
            }

            .action-button i {
                width: 1rem; /* w-4 */
                height: 1rem; /* h-4 */
                stroke-width: 2; /* make icons slightly bolder */
            }

            /* --- Empty State --- */
            .empty-state-cell {
                padding: 4rem 1.5rem; /* px-6 py-16 */
            }

            .empty-state-content {
                display: flex;
                flex-direction: column;
                align-items: center;
                text-align: center;
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
                margin-bottom: 0.5rem;
            }

            .empty-state-text {
                font-size: 0.9rem;
                margin-top: 0.25rem; /* mt-1 */
            }

            /* --- Pagination --- */
            .pagination-container {
                padding: 1rem; /* p-4 */
                border-top: 1px solid var(--border-light); /* border-t border-gray-200 */
                margin-top: 1.5rem; /* Optional: space above pagination */
                display: flex;
                justify-content: center;
                background-color: var(--card-bg); /* Ensure pagination background matches card */
                border-bottom-left-radius: 1rem; /* Match parent container radius */
                border-bottom-right-radius: 1rem; /* Match parent container radius */
            }
            .pagination-links nav {
                display: flex;
                justify-content: center;
                align-items: center;
                gap: 0.5rem;
            }
            .pagination-links a, .pagination-links span {
                padding: 0.5rem 0.8rem;
                border-radius: 0.5rem;
                text-decoration: none;
                color: var(--text-secondary);
                border: 1px solid var(--border-light);
                transition: all 0.2s ease-in-out;
            }
            .pagination-links a:hover {
                background-color: var(--primary-accent-color); /* Use primary accent for hover */
                color: var(--white);
                border-color: var(--primary-accent-color);
                box-shadow: var(--shadow-sm); /* Subtle shadow on hover */
            }
            .pagination-links span[aria-current="page"] {
                background-color: var(--primary-accent-color);
                color: var(--white);
                border-color: var(--primary-accent-color);
                font-weight: 600;
                box-shadow: var(--shadow-sm);
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
                .custom-table th, .custom-table td {
                    padding: 0.8rem 1rem;
                }
                .status-badge {
                    padding: 0.3rem 0.6rem;
                    font-size: 0.7rem;
                }
                .action-button {
                    padding: 0.4rem;
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
                .custom-table th, .custom-table td {
                    padding: 0.7rem 0.8rem;
                    font-size: 0.8rem;
                }
                .order-id-cell {
                    font-size: 0.7rem;
                }
                .status-badge {
                    padding: 0.25rem 0.5rem;
                    font-size: 0.65rem;
                }
                .action-button {
                    padding: 0.3rem;
                }
                .action-button i {
                    width: 0.9rem;
                    height: 0.9rem;
                }
                .empty-state-cell {
                    padding: 3rem 1rem;
                }
                .empty-state-icon {
                    width: 2.5rem;
                    height: 2.5rem;
                    margin-bottom: 0.8rem;
                }
                .empty-state-title {
                    font-size: 1rem;
                }
                .empty-state-text {
                    font-size: 0.8rem;
                }
                .pagination-links a, .pagination-links span {
                    padding: 0.4rem 0.7rem;
                    font-size: 0.8rem;
                }
            }
        </style>
    </head>
    <div class="page-content-wrapper">
        <div class="page-heading-container">
            <h1 class="page-heading">Kelola Pesanan</h1>
            <p class="page-subheading">Lacak dan kelola semua pesanan yang masuk.</p>
        </div>

        <div class="orders-table-wrapper">
            <div class="overflow-x-auto">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Nama Pelanggan</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Tanggal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="order-id-cell">#<?php echo e($order->id); ?></td>
                                <td class="customer-name-cell"><?php echo e($order->user->name ?? '-'); ?></td>
                                <td>
                                    <?php
                                        $statusClass = match(strtolower($order->status)) {
                                            'pending'    => 'status-pending',
                                            'processing' => 'status-processing',
                                            'done'       => 'status-done',
                                            'cancelled'  => 'status-cancelled',
                                            default      => 'status-default',
                                        };
                                    ?>
                                    <span class="status-badge <?php echo e($statusClass); ?>">
                                        <?php echo e(ucfirst($order->status)); ?>

                                    </span>
                                </td>
                                <td class="total-price-cell">Rp <?php echo e(number_format($order->total_price ?? 0, 0, ',', '.')); ?></td>
                                <td class="date-cell"><?php echo e($order->created_at->format('d M Y, H:i')); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo e(route('admin.orders.show', $order->id)); ?>" class="action-button" title="Lihat Detail">
                                        <i data-lucide="eye"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="empty-state-cell">
                                    <div class="empty-state-content">
                                        <i data-lucide="inbox" class="empty-state-icon"></i>
                                        <h3 class="empty-state-title">Tidak ada pesanan yang ditemukan</h3>
                                        <p class="empty-state-text">Semua pesanan akan muncul di sini.</p>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            
            <?php if($orders->hasPages()): ?>
                <div class="pagination-container">
                    <div class="pagination-links">
                        <?php echo e($orders->links()); ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        lucide.createIcons(); // Pastikan ikon Lucide di-render setelah konten dimuat
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\LENOVO\web-makanan\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>