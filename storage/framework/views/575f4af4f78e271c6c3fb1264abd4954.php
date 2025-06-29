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
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <style>
            /* Custom styles for a more polished look */
            body {
                font-family: 'Inter', sans-serif;
                background-color: #f7f9fc; /* Latar belakang super terang dan modern */
            }
            .table-gradient-header th {
                background: linear-gradient(to right,rgb(255, 182, 79),rgb(255, 162, 23)); /* Gradien yang lebih dalam */
                color: #ffffff;
                text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
            }
            .status-badge {
                padding: 0.35rem 0.8rem; /* Lebih besar */
                border-radius: 9999px; /* Sangat bulat */
                font-weight: 700; /* Lebih tebal */
                box-shadow: 0 1px 3px rgba(0,0,0,0.1); /* Bayangan lembut */
                transition: all 0.2s ease-in-out;
            }
            .status-done {
                background-color: #d1fae5; /* Hijau yang lebih cerah */
                color: #065f46; /* Teks hijau gelap */
            }
            .status-other {
                background-color: #e2e8f0; /* Abu-abu biru yang lebih terang */
                color: #475569; /* Teks abu-abu gelap */
            }
            .table-row-hover:hover {
                transform: translateY(-2px); /* Efek angkat sedikit */
                box-shadow: 0 4px 15px rgba(0,0,0,0.08); /* Bayangan lebih jelas */
                background-color: #edf2f7; /* Latar belakang hover yang lebih terang */
            }
        </style>
    </head>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl w-full space-y-10">
            <!-- Header Section -->
            <div class="text-center">
                <h1 class="text-5xl font-extrabold text-gray-900 tracking-tight leading-tight mb-4">
                    Riwayat Pesanan <span class="text-indigo-600">Terbaru Anda</span>
                </h1>
                <p class="text-xl text-gray-600 font-light max-w-2xl mx-auto">
                    Lihat kembali detail pesanan Anda, status pengiriman, dan metode pembayaran yang digunakan.
                </p>
            </div>

            <!-- Main Table Container -->
            <div class="bg-white rounded-4xl shadow-3xl border border-gray-200 overflow-hidden transform transition-all duration-300 hover:shadow-4xl">
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto text-base text-gray-800">
                        <thead class="table-gradient-header">
                            <tr>
                                <th class="px-6 py-4 rounded-tl-4xl font-semibold uppercase tracking-wider text-left">#</th>
                                <th class="px-6 py-4 font-semibold uppercase tracking-wider text-left">Produk</th>
                                <th class="px-6 py-4 font-semibold uppercase tracking-wider text-left">Total Bayar</th>
                                <th class="px-6 py-4 font-semibold uppercase tracking-wider text-left">Metode</th>
                                <th class="px-6 py-4 font-semibold uppercase tracking-wider text-left">Status</th>
                                <th class="px-6 py-4 rounded-tr-4xl font-semibold uppercase tracking-wider text-left">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="border-b border-gray-100 odd:bg-white even:bg-gray-50 table-row-hover">
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-700 font-medium"><?php echo e($loop->iteration); ?></td>

                                    
                                    <td class="px-6 py-4">
                                        <ul class="list-disc list-inside text-gray-700 space-y-1 text-sm">
                                            <?php $__currentLoopData = $history->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><span class="font-semibold text-gray-800"><?php echo e($item->product->name ?? '-'); ?></span> <span class="text-gray-500">x<?php echo e($item->quantity); ?></span></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap font-bold text-lg text-emerald-600">Rp <?php echo e(number_format($history->total_price, 0, ',', '.')); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap capitalize text-gray-700"><?php echo e($history->payment_method); ?></td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="status-badge <?php echo e($history->status === 'done' ? 'status-done' : 'status-other'); ?>">
                                            <?php echo e(ucfirst($history->status)); ?>

                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-500 text-sm"><?php echo e($history->created_at->format('d M Y, H:i')); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" class="text-center text-gray-500 py-12 text-xl font-medium">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg class="w-20 h-20 text-gray-300 mb-5 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 002-2v-1a2 2 0 00-2-2H9a2 2 0 00-2 2v1a2 2 0 002 2m0 0h6m-6 0H9m-6 0h6"></path>
                                            </svg>
                                            <p class="text-gray-600 font-semibold mb-2">Sepertinya Anda belum melakukan transaksi apa pun.</p>
                                            <p class="text-base text-gray-400">Mulailah petualangan belanja Anda sekarang dan lihat riwayatnya di sini!</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
<?php endif; ?>
<?php /**PATH C:\Users\LENOVO\web-makanan\resources\views/customer/history/index.blade.php ENDPATH**/ ?>