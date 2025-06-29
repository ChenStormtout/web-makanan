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
    <div class="max-w-5xl mx-auto px-6 py-12">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-10 text-center tracking-tight">Keranjang Belanja Anda</h1>

        <?php if(count($cart) > 0): ?>
            <div class="bg-white shadow-xl rounded-2xl overflow-hidden mb-12 border border-gray-100">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200">
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Produk</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Harga</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Jumlah</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">Subtotal</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $subtotal = $item['price'] * $item['quantity'];
                                $total += $subtotal;
                            ?>
                            <tr class="border-b border-gray-100 hover:bg-gray-50 transition duration-150 ease-in-out">
                                <td class="px-6 py-5 text-base text-gray-800"><?php echo e($item['name']); ?></td>
                                <td class="px-6 py-5 text-base text-gray-600">Rp<?php echo e(number_format($item['price'], 0, ',', '.')); ?></td>
                                <td class="px-6 py-5 text-base text-gray-600"><?php echo e($item['quantity']); ?></td>
                                <td class="px-6 py-5 text-base text-gray-900 font-semibold">Rp<?php echo e(number_format($subtotal, 0, ',', '.')); ?></td>
                                <td class="px-6 py-5 text-base">
                                    <form action="<?php echo e(route('customer.cart.remove')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="product_id" value="<?php echo e($item['id']); ?>">
                                        <button type="submit" class="text-red-600 hover:text-red-800 font-medium transition duration-200 ease-in-out">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <tr class="bg-gray-100 border-t-2 border-gray-200">
                            <td colspan="3" class="px-6 py-4 text-right text-lg font-bold text-gray-800">Total Keseluruhan</td>
                            <td class="px-6 py-4 text-lg font-bold text-gray-900">Rp<?php echo e(number_format($total, 0, ',', '.')); ?></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <form action="<?php echo e(route('customer.cart.checkout')); ?>" method="POST" class="bg-white p-10 shadow-xl rounded-2xl border border-gray-100">
                <?php echo csrf_field(); ?>
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Lengkapi Pesanan Anda</h2>

                <div class="mb-6">
                    <label for="address" class="block text-md font-medium text-gray-700 mb-2">Alamat Pengiriman</label>
                    <textarea name="address" id="address" rows="3" required class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-md placeholder-gray-400" placeholder="Contoh: Jl. Merdeka No. 123, Kota Yogyakarta, DI Yogyakarta, 55123"></textarea>
                </div>

                <div class="mb-8">
                    <label for="payment_method" class="block text-md font-medium text-gray-700 mb-2">Metode Pembayaran</label>
                    <select name="payment_method" id="payment_method" required class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-md">
                        <option value="cod">COD (Bayar di Tempat)</option>
                        <option value="transfer">Transfer Bank</option>
                        <option value="qris">QRIS</option>
                    </select>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 shadow-md">
                    Selesaikan Pembayaran
                </button>
            </form>
        <?php else: ?>
            <div class="bg-white shadow-xl rounded-2xl p-10 text-center border border-gray-100">
                <p class="text-gray-600 text-xl mb-4">Keranjang belanja Anda masih kosong.</p>
                <a href="#" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105 shadow-md">
                    Mulai Belanja Sekarang!
                </a>
            </div>
        <?php endif; ?>
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
<?php endif; ?><?php /**PATH C:\Users\LENOVO\web-makanan\resources\views/customer/cart.blade.php ENDPATH**/ ?>