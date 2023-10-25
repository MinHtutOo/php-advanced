<?php $__env->startSection('title', 'E-commerce'); ?>

<?php $__env->startSection('content'); ?>

<div class="container my-5">
    <h1 class="text-primary english">Most Popular</h1>
    <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-header text-center"><?php echo e($product->name); ?></div>
                    <div class="card-body" style="background-image: url('<?php echo e($product->image); ?>');">
                        <!-- <img src="<?php echo e($product->image); ?>" class="image img-fluid mx-auto" alt=""> -->
                        
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-info btn-sm">
                                <i class="fa fa-eye" id="eye"></i>
                            </button>

                            <span>$<?php echo e($product->price); ?></span>
                            
                            <button class="btn btn-info btn-sm text-center" onclick="addToCart('<?php echo e($product->id); ?>')">
                                <i class="fa fa-shopping-cart" id="cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex justify-content-center">
                <?php echo $pages; ?>

            </div>
    </div>


    <h1 class="text-primary english">Featured</h1>
    <div class="row">
        <?php $__currentLoopData = $featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-header text-center"><?php echo e($product->name); ?></div>
                    <div class="card-body" style="background-image: url('<?php echo e($product->image); ?>');">
                        
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-info btn-sm">
                                <i class="fa fa-eye" id="eye"></i>
                            </button>

                            <span>$<?php echo e($product->price); ?></span>
                            
                            <button class="btn btn-info btn-sm text-center" onclick="loadProduct('<?php echo e($product->id); ?>')">
                                <i class="fa fa-shopping-cart" id="cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-Commerce\resources\views/home.blade.php ENDPATH**/ ?>