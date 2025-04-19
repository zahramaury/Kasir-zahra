<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('breadcrumb', 'Dashboard'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <?php if(Auth::user()->role == 'admin'): ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Selamat Datang, Administrator!</h1>

        <div class="row">
            <!-- Ringkasan Sistem -->
            <div class="col-md-12">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body">
                        <h5 class="text-center mb-4">Ringkasan Sistem</h5>
                        <div class="row">
                            <!-- Total Produk -->
                            <div class="col-md-4 mb-3">
                                <div class="card text-white bg-primary shadow-sm">
                                    <div class="card-body">
                                        <h6 class="card-title">Total Produk</h6>
                                        <p class="card-text fs-4"><?php echo e($totalProduk ?? '—'); ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Total User -->
                            <div class="col-md-4 mb-3">
                                <div class="card text-white bg-success shadow-sm">
                                    <div class="card-body">
                                        <h6 class="card-title">Total User</h6>
                                        <p class="card-text fs-4"><?php echo e($totalUser ?? '—'); ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Transaksi -->
                            <div class="col-md-4 mb-3">
                                <div class="card text-white bg-warning shadow-sm">
                                    <div class="card-body">
                                        <h6 class="card-title">Total Transaksi</h6>
                                        <p class="card-text fs-4"><?php echo e($totalTransaksi ?? '—'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Terakhir Login -->
                            <div class="col-md-12">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h6 class="card-title">Terakhir Login</h6>
                                        <p class="card-text"><?php echo e(Auth::user()->last_login_at ?? '—'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if(Auth::user()->role == 'kasir'): ?>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h3 class="fw-bold">Selamat Datang, Petugas Kasir!</h3>
            <p class="text-muted">Berikut adalah ringkasan penjualan hari ini</p>
        </div>
    
        <div class="row justify-content-center">
            <!-- Total Penjualan Hari Ini -->
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-success shadow">
                    <div class="card-body text-center">
                        <h5 class="card-title">Total Penjualan Hari Ini</h5>
                        <h2 class="fw-bold"><?php echo e($count); ?></h2>
                    </div>
                </div>
            </div>
    
            <!-- Transaksi Member -->
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-primary shadow">
                    <div class="card-body text-center">
                        <h6 class="card-title">Transaksi Member</h6>
                        <h3 class="fw-bold"><?php echo e($member); ?></h3>
                    </div>
                </div>
            </div>
    
            <!-- Transaksi Non-Member -->
            <div class="col-md-4 mb-4">
                <div class="card text-white bg-warning shadow">
                    <div class="card-body text-center">
                        <h6 class="card-title">Transaksi Non-Member</h6>
                        <h3 class="fw-bold"><?php echo e($nonMember); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Terakhir Diperbarui -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <p class="text-muted small mb-0">
                            <?php if($updated && $updated->created_at): ?>
                                Terakhir diperbarui: <strong><?php echo e($updated->created_at->format('d-m-Y H:i:s')); ?></strong>
                            <?php else: ?>
                                Tidak ada Transaksi Hari Ini
                            <?php endif; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Cashier_Riskadwi\resources\views/dashboard.blade.php ENDPATH**/ ?>