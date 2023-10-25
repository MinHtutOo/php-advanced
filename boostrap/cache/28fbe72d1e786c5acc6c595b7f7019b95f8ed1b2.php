<?php $__env->startSection("title", "Product Create"); ?>

<?php $__env->startSection("content"); ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <?php echo $__env->make("layout.admin_sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-8">
                <?php echo $__env->make("layout.report_message", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Form Start -->
                    <form class="table-bordered pt-3 pb-3 px-5" action="<?php echo URL_ROOT . 'admin/product/create'; ?>" method="post" enctype="multipart/form-data">
                    <h3 class="text-center english my-3 text-info">Create Product</h3>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="number" step="any" class="form-control" id="price" name="price">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cat_id" class="form-label">Category</label>
                                    <select class="form-select" aria-label="Default select example" id="cat_id" name="cat_id">
                                        <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="sub_cat_id" class="form-label">Sub Category</label>
                                    <select class="form-select" aria-label="Default select example" id="sub_cat_id" name="sub_cat_id">
                                        <?php $__currentLoopData = $sub_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="file" class="form-label">Image Input</label>
                            <input class="form-control bg-secondary text-white" type="file" id="file" name="file">
                        </div>

                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <input type="hidden" name="token" value="<?php echo e(App\Classes\CSRFToken::_token()); ?>">

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="reseet" class="btn btn-outline-secondary" type="button">Cancel</button>
                            <button type="submit" class="btn btn-primary" type="button">Submit</button>
                        </div>
                    
                    </form>
                <!-- Form End -->
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-Commerce\resources\views/admin/product/create.blade.php ENDPATH**/ ?>