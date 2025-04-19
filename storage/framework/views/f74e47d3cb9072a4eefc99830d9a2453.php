<?php $__env->startSection('title', 'User - My Website'); ?>
<?php $__env->startSection('breadcrumb', 'User'); ?>
<?php $__env->startSection('page-title', 'User'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="d-flex justify-content-end align-items-center mb-4">
        <a class="btn btn-primary" href="<?php echo e(route('users.create')); ?>">Tambah User</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Email</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Role</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id = 1; ?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($id++); ?></th>
                            <td><?php echo e($user->email); ?></td>
                            <td><?php echo e($user->name); ?></td>
                            <td>
                                <span class="badge bg-<?php echo e($user->role == 'admin' ? 'primary' : 'secondary'); ?>">
                                    <?php echo e(ucfirst($user->role)); ?>

                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST" onsubmit="return confirm('Yakin mau hapus user ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <?php if($users->isEmpty()): ?>
                    <div class="text-center mt-4">
                        <p class="text-muted">Belum ada data user.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projek-laravel\kasir-dheanickyta\resources\views/User/index.blade.php ENDPATH**/ ?>