<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('breadcrumb', 'Dashboard'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">

    <?php if(Auth::user()->role == 'admin'): ?>
        <div class="text-start mb-5">
            <h2 class="fw-bold">Dashboard Admin</h2>
            <small class="text-muted">Kontrol penuh di tanganmu.</small>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card shadow-sm border-start border-4 border-primary h-100">
                    <div class="card-body">
                        <h6 class="text-muted">Jumlah Produk</h6>
                        <h2 class="fw-bold"><?php echo e($totalProduk ?? '0'); ?></h2>
                        <p class="mb-0 text-muted">Total produk yang tersedia.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm border-start border-4 border-success h-100">
                    <div class="card-body">
                        <h6 class="text-muted">Jumlah User</h6>
                        <h2 class="fw-bold"><?php echo e($totalUser ?? '0'); ?></h2>
                        <p class="mb-0 text-muted">Total pengguna terdaftar.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm border-start border-4 border-warning h-100">
                    <div class="card-body">
                        <h6 class="text-muted">Total Transaksi</h6>
                        <h2 class="fw-bold"><?php echo e($totalTransaksi ?? '0'); ?></h2>
                        <p class="mb-0 text-muted">Transaksi yang sudah diproses.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm border-start border-4 border-secondary h-100">
                    <div class="card-body">
                        <h6 class="text-muted">Login Terakhir</h6>
                        <h5 class="fw-bold"><?php echo e(Auth::user()->last_login_at ?? '—'); ?></h5>
                        <p class="mb-0 text-muted">Waktu login terakhir akun ini.</p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(Auth::user()->role == 'kasir'): ?>
        <div class="text-start mb-5">
            <h2 class="fw-bold">Dashboard Petugas</h2>
            <small class="text-muted">Pantau performa harianmu.</small>
        </div>

        <div class="row g-4">
            <div class="col-md-8">
                <div class="card shadow-sm border-0 bg-primary text-white h-100">
                    <div class="card-body">
                        <h5 class="fw-bold">Penjualan Hari Ini</h5>
                        <h1 class="fw-bold"><?php echo e($count); ?></h1>
                        <p class="text-white-50">Total transaksi yang berhasil hari ini.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <h6 class="text-muted">Terakhir Update</h6>
                        <p class="fw-bold">
                            <?php if($updated && $updated->created_at): ?>
                                <?php echo e($updated->created_at->format('d-m-Y H:i:s')); ?>

                            <?php else: ?>
                                Belum ada transaksi
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projek-laravel\kasir-dheanickyta\resources\views/dashboard.blade.php ENDPATH**/ ?>