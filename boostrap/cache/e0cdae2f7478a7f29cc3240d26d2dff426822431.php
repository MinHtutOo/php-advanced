<?php $__env->startSection('title', 'Category Create'); ?>

<?php $__env->startSection('content'); ?>

<div class="container my-5">
    <h1 class="text-primary text-center">Create Category</h1>
        <div class="col-md-8 offset-md-2">
            <!-- Form_Start -->
            <form action="<?php echo URL_ROOT . 'admin/category'; ?>" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="name" class="form-control" id="name" name="name">
                </div>

                <div class="row no-gutters py-2">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary english">Create</button>
                    </div>
                </div>
            </form>
            <!-- Form_End -->
        </div>
    </div>
<?php $__env->stopSection(); ?>
    

    
    


<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-Commerce\resources\views/admin/category/create.blade.php ENDPATH**/ ?>