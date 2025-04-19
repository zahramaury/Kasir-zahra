<?php $__env->startSection('title', 'All Product'); ?>
<?php $__env->startSection('breadcrumb', 'Product'); ?>
<?php $__env->startSection('page-title', 'Product'); ?>

<?php $__env->startSection('content'); ?>
<div class="container m-4">
    <?php if(Auth::user()->role == 'admin'): ?>
    <div class="d-flex justify-content-end mb-3">
        <a class="btn btn-primary" href="<?php echo e(route('products.create')); ?>">Tambah Produk</a>
    </div>

    <?php endif; ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Foto produk</th>
                <th scope="col" class="text-center">Nama Product</th>
                <th scope="col" class="text-center">Harga</th>
                <th scope="col" class="text-center">Stok</th>
                <?php if(Auth::user()->role == 'admin'): ?>
                <th scope="col" class="text-center">Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $id = 1;
            ?>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row" class="text-center"><?php echo e($id++); ?></th>
                <td class="text-center  w-25">
                    <img src="<?php echo e(asset('storage/'. $product->image)); ?>" alt="Product Image" class="img-fluid w-50">                </td>
                <td class="text-center"><?php echo e($product->name); ?></td>
                <td class="text-center">Rp <?php echo e(number_format($product->price, 0, ',', '.')); ?></td>
                <td class="text-center"><?php echo e($product->stock); ?></td>
                <?php if(Auth::user()->role == 'admin'): ?>
                <td class="text-center">
                    <div class="d-grid gap-4 d-md-flex justify-content-md-end">
                        <a href="<?php echo e(route('products.edit', $product->id)); ?>">
                            <button type="button" class="btn btn-warning">Edit</button>
                        </a>
                        <button class="btn btn-primary btn-update-stock" data-bs-toggle="modal"
                            data-bs-target="#updateStockModal" data-id="<?php echo e($product->id); ?>"
                            data-name="<?php echo e($product->name); ?>" data-stock="<?php echo e($product->stock); ?>">
                            Update Stok
                        </button>
                        <form action="<?php echo e(route('products.destroy', $product['id'])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-danger" type="submit">Hapus</button>
                        </form>
                    </div>
                </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<!-- Modal Update Stok -->
<div class="modal fade" id="updateStockModal" tabindex="-1" aria-labelledby="updateStockModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateStockModalLabel">Update Stok</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
            console.log(productId)
            console.log(productStock)
            console.log(productName)
            updateStockForm.action = `/product/${productId}/updateStock`;
        });
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\kasir\resources\views/product/index.blade.php ENDPATH**/ ?>