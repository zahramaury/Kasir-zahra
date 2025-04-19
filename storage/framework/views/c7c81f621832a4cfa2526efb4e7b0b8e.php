<?php $__env->startSection('title', 'All Product'); ?>
<?php $__env->startSection('breadcrumb', 'Product'); ?>
<?php $__env->startSection('page-title', 'Product'); ?>

<?php $__env->startSection('content'); ?>
<div class="container my-4">

    <?php if(Auth::user()->role == 'admin'): ?>
    <div class="d-flex justify-content-end mb-3">
        <a class="btn btn-success" href="<?php echo e(route('products.create')); ?>">
            <i class="bi bi-plus-circle"></i> Tambah Produk
        </a>
    </div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <?php if(Auth::user()->role == 'admin'): ?>
                            <th>Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <th scope="row"><?php echo e($index + 1); ?></th>
                            <td>
                                <img src="<?php echo e(asset('storage/'. $product->image)); ?>" alt="Product Image" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                            </td>
                            <td><?php echo e($product->name); ?></td>
                            <td>Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></td>
                            <td>
                                <?php if($product->stock > 0): ?>
                                    <span class="badge bg-success"><?php echo e($product->stock); ?></span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Stok Habis</span>
                                <?php endif; ?>
                            </td>
                            <?php if(Auth::user()->role == 'admin'): ?>
                            <td>
                                <div class="d-flex justify-content-center gap-2 flex-wrap">
                                    <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <button class="btn btn-primary btn-sm btn-update-stock"
                                        data-bs-toggle="modal" data-bs-target="#updateStockModal"
                                        data-id="<?php echo e($product->id); ?>" data-name="<?php echo e($product->name); ?>"
                                        data-stock="<?php echo e($product->stock); ?>">
                                        <i class="bi bi-box-seam"></i> Update Stok
                                    </button>
                                    <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus produk ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-danger btn-sm" type="submit">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="<?php echo e(Auth::user()->role == 'admin' ? '6' : '5'); ?>" class="text-center text-muted">Belum ada produk tersedia.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Stok -->
<div class="modal fade" id="updateStockModal" tabindex="-1" aria-labelledby="updateStockModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateStockModalLabel">Update Stok</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <form id="updateStockForm" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-body">
                    <input type="hidden" name="product_id" id="product_id">
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" id="product_name" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="form-label">Stok Baru</label>
                        <input type="number" class="form-control" name="stock" id="stock" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let updateStockModal = document.getElementById("updateStockModal");
        let updateStockForm = document.getElementById("updateStockForm");

        updateStockModal.addEventListener("show.bs.modal", function (event) {
            let button = event.relatedTarget;
            let productId = button.getAttribute("data-id");
            let productName = button.getAttribute("data-name");
            let productStock = button.getAttribute("data-stock");

            document.getElementById("product_id").value = productId;
            document.getElementById("product_name").value = productName;
            document.getElementById("stock").value = productStock;

            updateStockForm.action = `/product/${productId}/updateStock`;
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projek-laravel\kasir-dheanickyta\resources\views/product/index.blade.php ENDPATH**/ ?>