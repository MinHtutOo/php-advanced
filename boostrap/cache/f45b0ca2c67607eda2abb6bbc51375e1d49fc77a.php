<?php $__env->startSection('title', 'E-commerce'); ?>

<?php $__env->startSection('content'); ?>

<div class="container my-5">
    <h1 class="text-primary english">Most Popular</h1>
    <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-header text-center bold"><?php echo e($product->name); ?></div>
                    <div class="card-body" style="background-image: url('<?php echo e($product->image); ?>');">
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                            <a href="/E-Commerce/public/product/<?php echo e($product->id); ?>/detail" class="btn bt btn-sm">
                                <i class="fa fa-eye" id="eye"></i>
                            </a>

                            <span>$<?php echo e($product->price); ?></span>
                            
                            <button class="btn bt btn-sm text-center" onclick="addToCart('<?php echo e($product->id); ?>')">
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
                    <div class="card-header text-center bold"><?php echo e($product->name); ?></div>
                    <div class="card-body" style="background-image: url('<?php echo e($product->image); ?>');">
                        
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-between">
                        <a href="/E-Commerce/public/product/<?php echo e($product->id); ?>/detail" class="btn bt btn-sm">
                                <i class="fa fa-eye" id="eye"></i>
                            </a>

                            <span>$<?php echo e($product->price); ?></span>
                            
                            <button class="btn bt btn-sm text-center" onclick="addToCart('<?php echo e($product->id); ?>')">
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