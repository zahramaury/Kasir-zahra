<?php $__env->startSection('title', 'Pembelian'); ?>
<?php $__env->startSection('breadcrumb', 'Pembelian'); ?>
<?php $__env->startSection('page-title', 'Pembelian'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <button class="btn btn-primary"><a href="<?php echo e(route('formatexcel')); ?>" class="text-white">Export Pembelian
                        (.xlsx)</a></button>
            </div>
            <?php if(Auth::user()->role == 'kasir'): ?>
                <div>
                    <a class="btn btn-success" href="<?php echo e(route('pembelians.create')); ?>">Tambah Pembelian</a>
                </div>
            <?php endif; ?>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="dropdown me-2">
                Tampilkan
                <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    10
                </button>
                Entri
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">10</a></li>
                    <li><a class="dropdown-item" href="#">15</a></li>
                    <li><a class="dropdown-item" href="#">20</a></li>
                </ul>
            </div>
            <div>
                <form method="GET">
                    <input type="text" name="search" class="form-control" placeholder="Cari..."
                        value="<?php echo e(request('search')); ?>">
                </form>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col" class="text-center">Nama Pelanggan</th>
                    <th scope="col" class="text-center">Tanggal Pembelian</th>
                    <th scope="col" class="text-center">Total Harga</th>
                    <th scope="col" class="text-center">Dibuat Oleh</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th scope="row" class="text-center"><?php echo e($key + 1); ?></th>
                        <td class="text-center">
                            <?php echo e($item->member ? $item->member->name : 'Non Member'); ?>

                        </td>
                        <td class="text-center"><?php echo e($item->created_at->format('Y M d')); ?></td>
                        <td class="text-center"><?php echo e($item->total_price); ?></td>
                        <td class="text-center"><?php echo e($item->user->name); ?></td>
                        <td class="text-center">
                            <div class="d-grid gap-4 d-md-flex justify-content-md-end">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#modalDetail<?php echo e($item->id); ?>">Lihat</button>
                                <button class="btn btn-primary" type="button">
                                    <a href="<?php echo e(route('formatpdf', $item->id)); ?>" class="text-white">Unduh Bukti</a>
                                </button>
                            </div>
                        </td>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center">
            <div>
                Menampilkan 1 hingga 10 dari 100 entri
            </div>
            <div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
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
        <!-- Modal Detail Penjualan -->
        <div class="modal fade" id="modalDetail<?php echo e($item->id); ?>" tabindex="-1"
            aria-labelledby="modalDetailLabel<?php echo e($item->id); ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDetailLabel<?php echo e($item->id); ?>">Detail Pembelian</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-3">
                            <p>Member Status : <strong><?php echo e($item->member ? 'Member' : 'Non Member'); ?></strong></p>
                            <p>No. HP : <?php echo e($item->member->phone_number ?? '-'); ?></p>
                            <p>Poin Member : <?php echo e($item->member->poin_member ?? '-'); ?></p>
                            <p>Bergabung Sejak :
                                <?php echo e($item->member
                                    ? \Carbon\Carbon::parse($item->member->created_at)->format('d
                                                        F Y')
                                    : '-'); ?>

                            </p>
                        </div>

                        <table class="table table-bordered">
                            <thead>
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
                                        <td>Rp. <?php echo e(number_format($detail->product->price, 0, ',', '.')); ?></td>
                                        <td>Rp. <?php echo e(number_format($detail->product->price * $detail->qty, 0, ',', '.')); ?>

                                        </td>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-end"><strong>Total</strong></td>
                                    <td><strong><?php echo e($item->total_price); ?></strong></td>
                                </tr>
                            </tfoot>
                        </table>

                        <p class="mt-3 text-muted"><small>Dibuat pada : <?php echo e($item->created_at); ?><br>Oleh :
                                <?php echo e($item->user->name); ?></small></p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\kasir\resources\views/pembelian/index.blade.php ENDPATH**/ ?>