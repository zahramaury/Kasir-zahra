<?php $__env->startSection('title', 'Pembelian'); ?>
<?php $__env->startSection('breadcrumb', 'Pembelian'); ?>
<?php $__env->startSection('page-title', 'Pembelian'); ?>

<?php $__env->startSection('content'); ?>
<div class="container my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <a href="<?php echo e(route('formatexcel')); ?>" class="btn btn-primary">
                <i class="bi bi-file-earmark-excel"></i> Export Pembelian (.xlsx)
            </a>
        </div>
        <?php if(Auth::user()->role == 'kasir'): ?>
        <div>
            <a href="<?php echo e(route('pembelians.create')); ?>" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Tambah Pembelian
            </a>
        </div>
        <?php endif; ?>
    </div>

    <div class="row mb-4">
        <div class="col-md-6 d-flex align-items-center">
            <label class="me-2">Tampilkan</label>
            <select class="form-select w-auto">
                <option>10</option>
                <option>15</option>
                <option>20</option>
            </select>
            <label class="ms-2">Entri</label>
        </div>
        <div class="col-md-6">
            <form method="GET" class="d-flex">
                <input type="text" name="search" class="form-control" placeholder="Cari..." value="<?php echo e(request('search')); ?>">
            </form>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Pelanggan</th>
                    <th>Tanggal Pembelian</th>
                    <th>Total Harga</th>
                    <th>Dibuat Oleh</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($key + 1); ?></td>
                    <td><?php echo e($item->member ? $item->member->name : 'Non Member'); ?></td>
                    <td><?php echo e($item->created_at->format('d M Y')); ?></td>
                    <td>Rp <?php echo e(number_format($item->total_price, 0, ',', '.')); ?></td>
                    <td><?php echo e($item->user->name); ?></td>
                    <td>
                        <div class="d-flex flex-wrap gap-2 justify-content-center">
                            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modalDetail<?php echo e($item->id); ?>">
                                <i class="bi bi-eye"></i> Lihat
                            </button>
                            <a href="<?php echo e(route('formatpdf', $item->id)); ?>" class="btn btn-primary btn-sm">
                                <i class="bi bi-download"></i> Unduh
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="text-center text-muted">Tidak ada data pembelian.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-4">
        <div>
            Menampilkan 1 hingga 10 dari 100 entri
        </div>
        <div>
            <nav>
                <ul class="pagination mb-0">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<!-- Modal Detail Pembelian -->
<div class="modal fade" id="modalDetail<?php echo e($item->id); ?>" tabindex="-1" aria-labelledby="modalDetailLabel<?php echo e($item->id); ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDetailLabel<?php echo e($item->id); ?>">Detail Pembelian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="mb-4">
                    <p>Status Member : <strong><?php echo e($item->member ? 'Member' : 'Non Member'); ?></strong></p>
                    <p>No. HP : <?php echo e($item->member->phone_number ?? '-'); ?></p>
                    <p>Poin Member : <?php echo e($item->member->poin_member ?? '-'); ?></p>
                    <p>Bergabung Sejak :
                        <?php echo e($item->member ? \Carbon\Carbon::parse($item->member->created_at)->format('d F Y') : '-'); ?>

                    </p>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Produk</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $item->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($detail->product->name); ?></td>
                                <td><?php echo e($detail->qty); ?></td>
                                <td>Rp <?php echo e(number_format($detail->product->price, 0, ',', '.')); ?></td>
                                <td>Rp <?php echo e(number_format($detail->product->price * $detail->qty, 0, ',', '.')); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end"><strong>Total</strong></td>
                                <td><strong>Rp <?php echo e(number_format($item->total_price, 0, ',', '.')); ?></strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <p class="mt-3 text-muted">
                    <small>Dibuat pada: <?php echo e($item->created_at->format('d M Y H:i')); ?><br>
                    Oleh: <?php echo e($item->user->name); ?></small>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projek-laravel\kasir-dheanickyta\resources\views/pembelian/index.blade.php ENDPATH**/ ?>