@extends('layout.master')

@section('title', 'E-commerce')

@section('content')

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

@endsection

@section('script')
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
@endsection