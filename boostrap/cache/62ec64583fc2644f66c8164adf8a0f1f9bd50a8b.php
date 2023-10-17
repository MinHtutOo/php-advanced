<?php $__env->startSection('title', 'Category Create'); ?>

<?php $__env->startSection('content'); ?>

<div class="container my-5">
    <h1 class="text-primary text-center">Create Category</h1>
        <div class="row">
            <div class="col-md-4">
                <?php echo $__env->make("layout.admin_sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-8">
                <?php echo $__env->make("layout.report_message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if(\App\Classes\Session::has("delete_success")): ?>
                    <?php echo e(\App\Classes\Session::flash("delete_success")); ?>

                <?php endif; ?>

                <?php if(\App\Classes\Session::has("delete_fail")): ?>
                    <?php echo e(\App\Classes\Session::flash("delete_fail")); ?>

                <?php endif; ?>
                
                <!-- Form_Start -->
                <form action="<?php echo URL_ROOT . 'admin/category/create'; ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="name" class="form-control" id="name" name="name">
                    </div>

                    <input type="hidden" name="token" value="<?php echo e(App\Classes\CSRFToken::_token()); ?>">

                    <div class="row no-gutters py-2">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary english">Create</button>
                        </div>
                    </div>
                </form>
                <!-- Form_End -->
                <ul class="list-group mt-5">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item">
                        <a href="<?php echo URL_ROOT . '/admin/category/all'; ?>" style="text-decoration: none;color:darkblue;"><?php echo e($category->name); ?></a>
                        <span class="float-end">
                            <i class="fa fa-edit text-warning"></i>
                            <a href="<?php echo URL_ROOT . "admin/category/$category->id/delete"; ?>">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                        </span>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
    

    
    


<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-Commerce\resources\views//admin/category/create.blade.php ENDPATH**/ ?>