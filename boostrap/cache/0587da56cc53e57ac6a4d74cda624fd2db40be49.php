<?php $__env->startSection('title', 'E-commerce'); ?>

<?php $__env->startSection('content'); ?>

<div class="container my-5">
    <h1 class="english bold">Product Detail</h1>
    <div class="container-fluid bg-light" >
        <div class="d-flex justify-content-around">
            <div class="col-md-5">
                <img src="<?php echo e($product->image); ?>" alt="food" class="img-fluid">
            </div>
            <div class="col-md-6 scrollable-col">
                <h3 class="mt-3 english bold"><?php echo e($product->name); ?></h3>
                <p><?php echo e($product->description); ?></p>
                <button class="btn btn-secondary">$ <?php echo e($product->price); ?></button>
                <button class="btn btn-success" onclick="addToCart('<?php echo e($product->id); ?>')">Add to Cart</button>
                <p class="mt-3">
                        <b class="bold">RATE:</b>
                        <i class="fa fa-star-o text-warning"></i>
                        <i class="fa fa-star-o text-warning"></i>
                        <i class="fa fa-star-o text-warning"></i>
                        <i class="fa fa-star-o text-warning"></i>
                        <i class="fa fa-star-half-o text-warning"></i>
                </p>
                <h4 class="english bold">Special Offer Will End In</h4>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-Commerce\resources\views/product.blade.php ENDPATH**/ ?>