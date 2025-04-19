<?php $__env->startSection('title', 'Result Member Page'); ?>
<?php $__env->startSection('breadcrumb', 'Member'); ?>
<?php $__env->startSection('page-title', 'Member'); ?>

<?php $__env->startSection('content'); ?>

<div class="container mt-5">
    <div class="row">
        <!-- Bagian Produk -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $dataTransaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($sell['product_name']); ?></td>
                                <td><?php echo e($sell['qty']); ?></td>
                                <td><?php echo e($sell['price']); ?></td>
                                <td>Rp.<?php echo e($sell['subtotal']); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <h5 class="fw-bold">Harga Satuan: <span class="float-end">Rp. <?php echo e($totalBayar); ?></span></h5>
                    <h5 class="fw-bold">Total Harga: <span class="float-end">Rp. <?php echo e($subtotal); ?></span></h5>
                </div>
            </div>
        </div>

        <!-- Bagian Member -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <form action="<?php echo e(route('orderMember')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                        <label class="form-label">Nama Member (identitas)</label>
                        <input type="text" class="form-control" value="<?php echo e($member->name ?? ''); ?>" name="name" placeholder="Masukkan nama" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Poin</label>
                        <input type="text" class="form-control" value="<?php echo e($poinmember); ?>" name="poinMember" readonly>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="gunakanPoin" name="checkPoin"
                            <?php echo e($checkPoint <= 0 ? 'disabled' : ''); ?>>
                        <label class="form-check-label" for="gunakanPoin">Gunakan poin</label>
                    </div>
                    <input type="hidden" class="form-control hidden" name="phone_number" value="<?php echo e($member->phone_number ?? ''); ?>">
                    <input type="hidden" class="form-control hidden" name="total_bayar" value="<?php echo e($totalBayar ?? ''); ?>">
                    <button class="btn btn-primary">Selanjutnya</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\kasir-dheanickyta\resources\views/pembelian/checkMember.blade.php ENDPATH**/ ?>