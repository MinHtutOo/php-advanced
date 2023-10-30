<?php $__env->startSection("title", "Product Home"); ?>

<?php $__env->startSection("content"); ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <?php echo $__env->make("layout.admin_sidebar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="col-md-8">
                <?php if(\App\Classes\Session::has("product_insert_success")): ?>
                    <?php echo e(\App\Classes\Session::flash("product_insert_success")); ?>

                <?php endif; ?>


                <!-- Table Start -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">Number</th>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($product->id); ?></th>
                                    <td><img src="<?php echo e($product->image); ?>" class="img-fluid" style="max-width:100px; max-height:150px;"></td>
                                    <td><?php echo e($product->name); ?></td>
                                    <td>$<?php echo e($product->price); ?></td>
                                    <td>
                                        <a href="/E-Commerce/public/admin/product/<?php echo e($product->id); ?>/edit" class="edit">
                                            <i class="fa fa-edit text-warning" id="edit"><span class="space">Edit</span></i>
                                        </a>

                                        <a href="/E-Commerce/public/admin/product/<?php echo e($product->id); ?>/delete" class="delete">
                                            <i class="fa fa-trash text-danger" id="trash"><span class="space">Delete</span></i>
                                        </a>                                          
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                        </tbody>
                    </table>
                <!-- Table End -->

                <div class="mt-3 offset-md-5">
                    <?php echo $pages; ?>

                </div>


            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-Commerce\resources\views/admin/product/home.blade.php ENDPATH**/ ?>