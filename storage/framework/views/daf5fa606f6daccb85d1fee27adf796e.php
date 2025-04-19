<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('breadcrumb', 'Dashboard'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <?php if(Auth::user()->role == 'admin'): ?>
    <div class="container mt-5">
    <div class="text-center mb-4">
        <h3 class="fw-bold">Selamat Datang Admin!</h3>
        <p class="text-muted">Berikut adalah data produk, user, dan transaksi</p>
    </div>
        <div class="row">
            <!-- Ringkasan Sistem -->
            <div class="col-md-12">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body">
                        
                        <div class="row">
                            <!-- Total Produk -->
                            <div class="col-md-4 mb-3">
                                <div class="card text-white bg-info shadow-sm">
                                    <div class="card-body">
                                        <div class="text-center mb-4">
                                            <h6 class="fw-bold fs-4">Total Produk</h6>
                                            <p class="fw-bold fs-10"><?php echo e($totalProduk ?? '—'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Total User -->
                            <div class="col-md-4 mb-3">
                                <div class="card text-white bg-info shadow-sm">
                                    <div class="card-body">
                                        <div class="text-center mb-4">
                                            <h6 class="fw-bold fs-4">Total User</h6>
                                            <p class="fw-bold fs-10"><?php echo e($totalUser ?? '—'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Total Transaksi -->
                            <div class="col-md-4 mb-3">
                                <div class="card text-white bg-info shadow-sm">
                                    <div class="card-body">
                                        <div class="text-center mb-4">
                                            <h6 class="fw-bold fs-4">Total Transaksi</h6>
                                            <p class="fw-bold fs-10"><?php echo e($totalTransaksi ?? '—'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="row">
                            <!-- Terakhir Login -->
                            <div class="col-md-12">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h6 class="fw-bold fs-4">Terakhir Login</h6>
                                        <p class="card-text fs-10"><?php echo e(Auth::user()->last_login_at ?? '—'); ?></p>
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
            <h3 class="fw-bold">Selamat Datang Petugas!</h3>
            <p class="text-muted">Berikut adalah ringkasan penjualan hari ini</p>
        </div>
    
        <div class="d-flex justify-content-center align-items-center" style="min-height: 60vh;">
            <div class="col-md-4">
                <div class="card shadow" style="background-color: rgba(255, 255, 255, 0.15); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2); color: white;">
                    <div class="card-body text-center">
                        <h5 class="fw-bold fs-4">Total Penjualan Hari Ini</h5>
                        <h2 class="fw-bold fs-10"><?php echo e($count); ?></h2>
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

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\kasir-dheanickyta\resources\views/dashboard.blade.php ENDPATH**/ ?>