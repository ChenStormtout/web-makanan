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
    <div class="p-6 max-w-xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Edit Produk</h1>
        <form action="<?php echo e(route('admin.products.update', $product)); ?>" method="POST" enctype="multipart/form-data" class="space-y-4">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div>
                <label>Nama Produk</label>
                <input type="text" name="name" class="w-full border p-2 rounded" value="<?php echo e(old('name', $product->name)); ?>" required>
            </div>
            <div>
                <label>Kategori</label>
                <select name="category_id" class="w-full border p-2 rounded" required>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($cat->id); ?>" <?php echo e($cat->id == $product->category_id ? 'selected' : ''); ?>>
                            <?php echo e($cat->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div>
                <label>Harga</label>
                <input type="number" name="price" class="w-full border p-2 rounded" value="<?php echo e(old('price', $product->price)); ?>" required>
            </div>
            <div>
                <label>Deskripsi</label>
                <textarea name="description" class="w-full border p-2 rounded"><?php echo e(old('description', $product->description)); ?></textarea>
            </div>
            <div>
                <label>Gambar (biarkan kosong jika tidak ingin mengganti)</label>
                <input type="file" name="image" class="w-full border p-2 rounded">
                <?php if($product->image): ?>
                    <img src="<?php echo e(asset('storage/'.$product->image)); ?>" alt="Gambar Produk" class="w-32 mt-2 rounded shadow">
                <?php endif; ?>
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Update</button>
        </form>
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
<?php /**PATH C:\Users\LENOVO\web-makanan\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>