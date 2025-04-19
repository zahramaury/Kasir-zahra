<?php $__env->startSection('title', 'Member Page'); ?>
<?php $__env->startSection('breadcrumb', 'Member'); ?>
<?php $__env->startSection('page-title', 'Member'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <div class="card p-4">
        <h4 class="fw-semibold">Produk yang dipilih</h4>
        <ul class="list-unstyled">
            <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="d-flex justify-content-between mt-2">
                    <div>
                        <span class="fw-semibold"><?php echo e($item->product->name); ?></span>
                        <br>
                        <small class="text-muted">Rp. <?php echo e(number_format($item->product->price, 0, ',', '.')); ?> x <?php echo e($item->qty); ?></small>
                    </div>
                    <span class="fw-semibold">Rp. <?php echo e(number_format($item->product->price * $item->qty, 0, ',', '.')); ?></span>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <hr>
        <div class="d-flex justify-content-between">
            <strong>Total</strong>
            <strong>Rp. <?php echo e(number_format($totalPrice, 0, ',', '.')); ?></strong>
        </div>
        <hr>
        <form action="<?php echo e(route('pembelians.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="memberStatus" class="form-label">Member Status</label>
                <select class="form-select" id="memberStatus" name="member" required>
                    <option selected disabled>Pilih Tipe</option>
                    <option value="non-member">Bukan Member</option>
                    <option value="member">Member</option>
                </select>
            </div>
            <div class="mb-3 d-none" id="memberNameGroup">
                <label for="memberName" class="form-label">Nama Member</label>
                <input type="text" class="form-control" id="memberName" name="name" placeholder="Masukkan nama member" required>
            </div>
            <div class="mb-3 d-none" id="phoneInput">
                <label for="phoneNumber" class="form-label">Nomor Telepon</label>
                <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Masukkan nomor telepon" required>
            </div>
            <div class="mb-3">
                <label for="totalBayar" class="form-label">Total Bayar</label>
                <input type="text" class="form-control" id="totalBayar" name="total_bayar" placeholder="Masukkan jumlah pembayaran" required>
            </div>
            <button class="btn btn-primary w-100" type="submit">Pesan</button>
        </form>
    </div>
</div>

<script>
    const totalPrice = <?php echo e($totalPrice); ?>;

    const totalBayarInput = document.getElementById('totalBayar');
    totalBayarInput.value = new Intl.NumberFormat('id-ID').format(totalPrice);

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

    totalBayarInput.addEventListener('input', function (e) {
        let value = e.target.value.replace(/\D/g, '');
        e.target.value = new Intl.NumberFormat('id-ID').format(value);
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\kasir\resources\views/pembelian/member.blade.php ENDPATH**/ ?>