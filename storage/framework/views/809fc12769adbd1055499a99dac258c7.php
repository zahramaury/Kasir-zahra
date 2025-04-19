<?php $__env->startSection('title', 'Tambah Produk'); ?>
<?php $__env->startSection('breadcrumb', 'Tambah Produk'); ?>
<?php $__env->startSection('page-title', 'Tambah Produk'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="card shadow-sm p-4 rounded-4">
        <form action="<?php echo e(route('products.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Produk">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="image" class="form-label">Gambar Produk <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label">Harga <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Masukkan Harga">
                    </div>
                </div>
                
                <div class="col-md-6 mb-3">
                    <label for="stock" class="form-label">Stok <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="stock" name="stock" placeholder="Masukkan Stok">
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mt-3 w-25 rounded-5">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\kasir-dheanickyta\resources\views/Product/tambah.blade.php ENDPATH**/ ?>