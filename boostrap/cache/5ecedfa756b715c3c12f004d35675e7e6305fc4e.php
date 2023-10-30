<?php $__env->startSection("title", "User Register"); ?>

<?php $__env->startSection("content"); ?>
    <div class="container my-5">
        <div class="col-md-8 offset-md-2">
        <h1>User Register</h1>
        <?php if(\App\Classes\Session::has("error_message")): ?>
            <?php echo e(\App\Classes\Session::flash("error_message")); ?>

        <?php endif; ?>
            <form action="<?php echo URL_ROOT . 'user/register'; ?>" method="post">
                <input type="hidden" name="token" value="<?php echo e(App\Classes\CSRFToken::_token()); ?>">

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>

                <div class="mb-3 d-flex justify-content-between">
                    <span>
                        Already Here!
                        <a href="<?php echo URL_ROOT . 'user/login'; ?>">Login Here</a>
                    </span>
                    <span>
                        <button class="btn btn-outline-warning btn-sm">Cancel</button>
                        <button class="btn btn-primary btn-sm">Register</button>
                    </span>
                </div>
                
            </form>
        </div>
    </div>
   

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-Commerce\resources\views/user/register.blade.php ENDPATH**/ ?>