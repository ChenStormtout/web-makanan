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
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="receipt" class="w-5 h-5 text-orange-600"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">Detail Pesanan</h1>
                    <p class="text-sm text-gray-500">#<?php echo e($order->id); ?></p>
                </div>
            </div>

            <!-- Status Badge -->
            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium
                <?php switch($order->status):
                    case ('pending'): ?> bg-yellow-100 text-yellow-700 border border-yellow-200 <?php break; ?>
                    <?php case ('processing'): ?> bg-blue-100 text-blue-700 border border-blue-200 <?php break; ?>
                    <?php case ('done'): ?> bg-green-100 text-green-700 border border-green-200 <?php break; ?>
                    <?php default: ?> bg-gray-100 text-gray-700 border border-gray-200
                <?php endswitch; ?>
            ">
                <span class="w-2 h-2 rounded-full mr-2
                    <?php switch($order->status):
                        case ('pending'): ?> bg-yellow-400 <?php break; ?>
                        <?php case ('processing'): ?> bg-blue-400 <?php break; ?>
                        <?php case ('done'): ?> bg-green-400 <?php break; ?>
                        <?php default: ?> bg-gray-400
                    <?php endswitch; ?>
                "></span>
                <?php echo e(ucfirst($order->status)); ?>

            </span>
        </div>
    </div>

    <!-- Info Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Customer Info -->
        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="user" class="w-4 h-4 text-blue-600"></i>
                </div>
                <h3 class="font-medium text-gray-900">Informasi Pelanggan</h3>
            </div>
            <p class="text-gray-900 font-medium"><?php echo e($order->user->name ?? '-'); ?></p>
            <p class="text-sm text-gray-600 mt-1"><?php echo e($order->user->email ?? '-'); ?></p>
        </div>

        <!-- Order Date -->
        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="calendar" class="w-4 h-4 text-green-600"></i>
                </div>
                <h3 class="font-medium text-gray-900">Tanggal Pesanan</h3>
            </div>
            <p class="text-gray-900 font-medium"><?php echo e($order->created_at->format('d M Y')); ?></p>
            <p class="text-sm text-gray-600 mt-1"><?php echo e($order->created_at->format('H:i')); ?> WIB</p>
        </div>

        <!-- Total -->
        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="banknote" class="w-4 h-4 text-orange-600"></i>
                </div>
                <h3 class="font-medium text-gray-900">Total Pembayaran</h3>
            </div>
            <p class="text-2xl font-semibold text-gray-900">Rp <?php echo e(number_format($order->total_price, 0, ',', '.')); ?></p>
        </div>
    </div>

    <!-- Order Items -->
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i data-lucide="shopping-bag" class="w-4 h-4 text-purple-600"></i>
                </div>
                <h2 class="text-lg font-medium text-gray-900">Item Pesanan</h2>
                <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded-full">
                    <?php echo e($order->items->count()); ?> item
                </span>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Produk</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Jumlah</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Harga Satuan</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <i data-lucide="package" class="w-4 h-4 text-gray-500"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900"><?php echo e($item->product->name ?? '-'); ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-800 text-sm font-medium rounded-full">
                                    <?php echo e($item->quantity); ?>

                                </span>
                            </td>
                            <td class="px-6 py-4 text-right font-medium text-gray-900">
                                Rp <?php echo e(number_format($item->price, 0, ',', '.')); ?>

                            </td>
                            <td class="px-6 py-4 text-right font-semibold text-gray-900">
                                Rp <?php echo e(number_format($item->price * $item->quantity, 0, ',', '.')); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot class="bg-gray-50">
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-right font-medium text-gray-900">Total Keseluruhan:</td>
                        <td class="px-6 py-4 text-right text-xl font-bold text-gray-900">
                            Rp <?php echo e(number_format($order->total_price, 0, ',', '.')); ?>

                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex items-center justify-between mt-8">
        <a href="<?php echo e(route('admin.orders.index')); ?>"
           class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
            <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
            Kembali ke Daftar Pesanan
        </a>

        <div class="flex space-x-3">
            <!-- Cetak Invoice -->
            <a href="<?php echo e(route('admin.orders.invoice', $order->id)); ?>"
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-700 bg-blue-100 border border-blue-200 rounded-lg hover:bg-blue-200 transition-colors duration-200">
                <i data-lucide="printer" class="w-4 h-4 mr-2"></i>
                Cetak Invoice
            </a>

            <!-- Tandai Selesai -->
            <?php if($order->status !== 'done'): ?>
            <form method="POST" action="<?php echo e(route('admin.orders.done', $order->id)); ?>">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('PUT'); ?>
                   <input type="hidden" name="status" value="done">
                  <button type="submit"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-green-600 rounded-lg hover:bg-green-700 transition-colors duration-200">
                  <i data-lucide="check" class="w-4 h-4 mr-2"></i>
                  Tandai Selesai
                  </button>
            /form>
            <?php endif; ?>
        </div>
    </div>

    <script>
        lucide.createIcons();
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
<?php endif; ?>
<?php /**PATH C:\Users\LENOVO\web-makanan\resources\views/admin/orders/show.blade.php ENDPATH**/ ?>