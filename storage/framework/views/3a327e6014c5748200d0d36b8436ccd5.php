    
    <?php $__env->startSection('title', 'Pembelian'); ?>
    <?php $__env->startSection('breadcrumb', 'Tambah Transaksi'); ?>
    <?php $__env->startSection('page-title', 'Tambah Transaksi'); ?>

    <?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <div class="row g-4">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="card h-100 text-center p-3">
                    <img src="<?php echo e(asset('storage/'. $product->image)); ?>" class="card-img-top mx-auto"
                        style="width: 170px; height: 170px; object-fit: cover;" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($product->name); ?></h5>
                        <p class="text-muted">Stok: <span id="stock-<?php echo e($product->id); ?>"><?php echo e($product->stock); ?></span></p>
                        <h6 class="fw-bold">Rp. <?php echo e(number_format($product->price, 0, ',', '.')); ?></h6>
                        <div class="d-flex justify-content-center align-items-center mt-2">
                            <button type="button" class="btn btn-outline-secondary btn-sm btn-decrease" data-id="<?php echo e($product->id); ?>">-</button>
                            <span class="mx-3 qty" id="qty-<?php echo e($product->id); ?>">0</span>
                            <button type="button" class="btn btn-outline-secondary btn-sm btn-increase"
                                data-id="<?php echo e($product->id); ?>"
                                data-stock="<?php echo e($product->stock); ?>"
                                data-price="<?php echo e($product->price); ?>">+</button>
                        </div>
                        <p class="mt-3">Sub Total: <span class="fw-bold subtotal" id="subtotal-<?php echo e($product->id); ?>">Rp. 0</span></p>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="text-center mt-4">
            <form action="<?php echo e(route('store.cart')); ?>" method="POST" id="cartForm">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="cart_data" id="cartData">
                <button type="submit" class="btn btn-primary">Selanjutnya</button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.btn-increase, .btn-decrease').forEach(button => {
                button.addEventListener('click', function (event) {
                    event.preventDefault();

                    let productId = this.getAttribute('data-id');
                    let qtyElement = document.getElementById(`qty-${productId}`);
                    let subtotalElement = document.getElementById(`subtotal-${productId}`);
                    let stock = parseInt(this.getAttribute('data-stock'));
                    let price = parseInt(this.getAttribute('data-price'));
                    let currentQty = parseInt(qtyElement.innerText);

                    let newQty = this.classList.contains('btn-increase')
                        ? Math.min(currentQty + 1, stock)
                        : Math.max(currentQty - 1, 0);

                    qtyElement.innerText = newQty;
                    subtotalElement.innerText = `Rp. ${(newQty * price).toLocaleString('id-ID')}`;
                });
            });

            document.getElementById('cartForm').addEventListener('submit', function (event) {
                let cartData = {};
                document.querySelectorAll('.qty').forEach(qtyElement => {
                    let productId = qtyElement.id.split('-')[1];
                    let quantity = parseInt(qtyElement.innerText);
                    if (quantity > 0) {
                        cartData[productId] = quantity;
                    }
                });
                document.getElementById('cartData').value = JSON.stringify(cartData);
            });
        });
    </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\kasir-dheanickyta\resources\views/pembelian/tambah.blade.php ENDPATH**/ ?>