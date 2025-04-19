<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="<?php echo e(route('dashboard')); ?>" aria-expanded="false"><i
                            class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="<?php echo e(route('products.index')); ?>" aria-expanded="false"><i class="mdi mdi-store"></i><span
                            class="hide-menu">Produk</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="<?php echo e(route('pembelians.index')); ?>" aria-expanded="false"><i
                            class="mdi mdi-cart"></i><span class="hide-menu">Pembelian</span></a></li>
                <?php if(Auth::user()->role == 'admin'): ?>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="<?php echo e(route('users.index')); ?>" aria-expanded="false"><i
                            class="mdi mdi-account-network"></i><span class="hide-menu">User</span></a></li>
                <?php endif; ?>
                <!-- Logout Button -->
                

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<?php /**PATH C:\Cashier_Riskadwi\resources\views/layout/nav.blade.php ENDPATH**/ ?>