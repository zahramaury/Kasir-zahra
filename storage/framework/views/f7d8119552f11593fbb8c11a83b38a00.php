<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

    <?php echo $__env->make('layout.include-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>


<body>
    <?php echo $__env->make('layout.loading-animation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <?php echo $__env->make('layout.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="page-wrapper">

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                              <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                              <li class="breadcrumb-item active" aria-current="page"><?php echo $__env->yieldContent('breadcrumb', 'Dashboard'); ?></li>
                            </ol>   
                          </nav>
                        <h1 class="mb-0 fw-bold"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h1>
                    </div>

                </div>
            </div>

            <div class="container-fluid">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>

        

    </div>

    <?php echo $__env->make('layout.include-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\kasir\resources\views/main.blade.php ENDPATH**/ ?>