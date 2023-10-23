<?php $__env->startSection("title", "Product Home"); ?>

<?php $__env->startSection("content"); ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <?php echo $__env->make("layout.admin_sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-8">
                <h1>Product</h1>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-Commerce\resources\views/admin/product/home.blade.php ENDPATH**/ ?>