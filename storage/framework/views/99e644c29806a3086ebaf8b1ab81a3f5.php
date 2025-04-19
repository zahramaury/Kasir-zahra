<?php $__env->startSection('title', 'Result Member Page'); ?>
<?php $__env->startSection('breadcrumb', 'Member'); ?>
<?php $__env->startSection('page-title', 'Member'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="mb-4">
        <a href="<?php echo e(route('formatpdf', ['id' => $transactionId])); ?>" class="btn btn-primary">Unduh</a>
        <button class="btn btn-secondary"><a href="<?php echo e(route('pembelians.index')); ?>" class="text-white text-decoration none" >Kembali</a></button>
    </div>
    <div class="card p-4 shadow-sm">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold">Invoice - #<?php echo e($invoiceNumber); ?></h5>
            <span class="text-muted"><?php echo e(now()->format('d M Y')); ?></span>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $sellingData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sell): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($sell['product_name']); ?></td>
                    <td><?php echo e($sell['price']); ?></td>
                    <td><?php echo e($sell['qty']); ?></td>
                    <td><?php echo e($sell['subtotal']); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div class="row mt-4">
            <div class="col-md-6">
                <table class="table table-borderless">

                    <tr>
                        <td>Poin Digunakan</td>
                        <td class="text-end">0</td>
                    </tr>


                    <tr>
                        <td>Kasir</td>
                        <td class="text-end fw-bold"><?php echo e($userName); ?></td>
                    </tr>
                    <tr>
                        <td>Kembalian</td>
                        <td class="text-end text-success fw-bold"><?php echo e($kembalian); ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <div class="bg-dark text-white p-3 text-center rounded">
                    <h5 class="m-0 text-white">TOTAL PRICE</h5>
                    <h3 class="fw-bold text-white" id="total_prices"><?php echo e($totalPrice); ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const totalPrice = <?php echo e($totalPrice); ?>;
    const totalBayarInput = document.getElementById('totalBayar');
    const kembalianInput = document.getElementById('kembalian');

    totalBayarInput.value = new Intl.NumberFormat('id-ID').format(totalPrice);

    function hitungKembalian() {
        let bayarValue = totalBayarInput.value.replace(/\D/g, '');
        let bayar = parseInt(bayarValue || '0');
        let kembali = bayar - totalPrice;

        kembalianInput.value = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(kembali);
    }

    totalBayarInput.addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, '');
        e.target.value = new Intl.NumberFormat('id-ID').format(value);

        hitungKembalian();
    });

    hitungKembalian();

    const memberStatus = document.getElementById('memberStatus');
    const phoneInput = document.getElementById('phoneInput');
    const phoneField = document.getElementById('phoneNumber');
    const memberNameGroup = document.getElementById('memberNameGroup');
    const memberNameField = document.getElementById('memberName');

    memberStatus.addEventListener('change', function () {
        if (this.value === 'member') {
            phoneInput.classList.remove('d-none');
            memberNameGroup.classList.remove('d-none');
            phoneField.required = true;
            memberNameField.required = true;
        } else {
            phoneInput.classList.add('d-none');
            memberNameGroup.classList.add('d-none');
            phoneField.required = false;
            memberNameField.required = false;
            phoneField.value = '';
            memberNameField.value = '';
        }
    });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\kasir-dheanickyta\resources\views/pembelian/result.blade.php ENDPATH**/ ?>