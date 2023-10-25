<?php $__env->startSection('title', 'E-commerce'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <!-- Table Start -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">Number</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    
                </tbody>
            </table>
        <!-- Table End -->
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        function loadProduct() {
            // alert(123);
            // clearCart();
            $.ajax({
                type: "POST",
                url:"http://localhost/E-commerce/public/cart",
                data: {
                    "cart": getCartItem()
                },
                success : function(result) {
                    // clearCart();
                    console.log(result);
                    // window.location.href = "cart";
                },
                errors : function(response) {
                    console.log(response.responseText);
                }
            })
        }

        function saveProducts() {
            
        }

        function updateProducts() {

        }

        function showProducts() {

        }

        function payOut() {

        }

        loadProduct();
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\E-Commerce\resources\views/cart.blade.php ENDPATH**/ ?>