<?php $__env->startSection('title', 'User - My Website'); ?>
<?php $__env->startSection('breadcrumb', 'User'); ?>
<?php $__env->startSection('page-title', 'User'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="d-flex justify-content-end align-items-center mb-4">
        <div>
            <a class="btn btn-primary" href="<?php echo e(route('users.create')); ?>">Tambah User</a>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Nama</th>
                <th scope="col" class="text-center">Role</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $id = 1;
            ?>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row" class="text-center"><?php echo e($id++); ?></th>
                <td class="text-center"><?php echo e($user->email); ?></td>
                <td class="text-center"><?php echo e($user->name); ?></td>
                <td class="text-center"><?php echo e($user->role); ?></td>
                <td class="text-center">
                    <div class="d-grid gap-4 d-md-flex justify-content-md-end">
                        <a href="<?php echo e(route('users.edit', $user['id'])); ?>"><button type="button"
                                class="btn btn-warning">Edit</button></a>
                        <form action="<?php echo e(route('users.destroy', $user['id'])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-danger" type="submit">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\kasir\resources\views/User/index.blade.php ENDPATH**/ ?>