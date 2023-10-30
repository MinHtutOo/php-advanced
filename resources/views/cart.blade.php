@extends('layout.master')

@section('title', 'E-commerce')

@section('content')

    <input type="hidden" name="token" id="token" value="{{App\Classes\CSRFToken::_token()}}">

    <div class="container">
        <!-- Table Start -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody id="table_body">
                    
                </tbody>
                @if(App\Classes\Auth::check())
                    <tr>
                        <td colspan="7" class="text-end" id="checkoutBtn">
                            <button class='btn btn-primary btn-sm' onclick='payOut()'>Checkout</button>
                        </td>
                    </tr>   

                    <tr style="visibility:hidden;" id="stripeTR">
                        <td colspan="7" class="text-end">
                            <form action="/E-commerce/public/payment/stripe" method="post" style="display: none;" id="stripeForm">
                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="{{App\Classes\Session::get("publishable_key")}}"
                                data-name="Lets Bite"
                                data-description="Not like others.Taste better!"
                                data-amount="5000"
                                data-email="{{App\Classes\Auth::user()->email}}"
                                data-zip-code="true"
                                data-locale="auto"></script>
                            </form>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="7" class=text-end>
                            <a href="/E-Commerce/public/user/login" class='btn btn-primary btn-sm'>Login to Checkout</a>
                        </td>
                    </tr>
                @endif
                
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
                url:"/E-Commerce/public/cart",
                data: {
                    "cart": getCartItem(),
                    "token" : $("#token").val()
                },
                success : function(results) {
                    // clearCart();
                    // console.log(results);
                    // window.location.href = "cart";
                    saveProducts(results);
                },
                errors : function(response) {
                    console.log(response.responseText);
                }
            });
        }

        function saveProducts(res) {
            localStorage.setItem("products", res);
            let results = JSON.parse(localStorage.getItem("products"));
            showProducts(results);
        }

        function addQty(id) {
            var results = JSON.parse(localStorage.getItem("products"));
            results.forEach((result) => {
                if(result.id === id) {
                    result.qty = result.qty + 1;
                }
            });
            saveProducts(JSON.stringify(results));
        }

        function reduceQty(id) {
            var results = JSON.parse(localStorage.getItem("products"));
            results.forEach((result) => {
                if(result.id === id) {
                    if(result.qty > 1) {
                        result.qty = result.qty - 1;
                    }
                }
            });
            saveProducts(JSON.stringify(results));
        }

        function showProducts(results) {
            var str = "";
            var total = 0;
            results.forEach((result) => {
                // console.log(result.id);
                total += result.qty * result.price;
                str += "<tr>";
                str += `
                    <td>${result.id}</td>
                    <td>
                        <img src='${result.image}' class='img-fluid' style='max-width:100px; max-height:150px;'>
                    </td>
                    <td>${result.name}</td>
                    <td>${result.price}</td>
                    <td class='text-center'>
                        <i class='fa fa-angle-left me-1' id='reduce' style='cursor:pointer;' onclick='reduceQty(${result.id})'></i>
                            ${result.qty}
                        <i class='fa fa-angle-right' id='add' style='cursor:pointer;' onclick='addQty(${result.id})'></i>
                    </td>
                    <td>${(result.price * result.qty).toFixed(2)}
                    </td>
                    <td>
                        <i class='fa fa-trash text-danger' id='trash' style='cursor:pointer;' onclick='deleteProduct(${result.id})'><span class='space'>Delete</span></i>
                    </td>
                `;
                str += "</tr>";
            });
            str += `
                    <tr>
                        <td colspan="6" class=text-end>Grand Total</td>
                        <td>${total.toFixed(2)}</td>
                    </tr>
                `
            $('#table_body').html(str);
        }

        function deleteProduct(id) {
            var results = JSON.parse(localStorage.getItem("products"));
            results.forEach((result) => {
                if(result.id === id) {
                    var ind = results.indexOf(result);
                    results.splice(ind,1);
                }
            });
            deleteItem(id);
            saveProducts(JSON.stringify(results));
        }

        function payOut() {
            // alert($('#token').val());
            var results = JSON.parse(localStorage.getItem("products"));
            $.ajax({
                type: "POST",
                url:"/E-Commerce/public/payout",
                data: {
                    "items": results,
                    "token" : $("#token").val()
                },
                success : function(results) {
                    console.log(results);
                    $('#checkoutBtn').css("display", "none");
                    $('#stripeTR').css("visibility", "visible");
                    $('#stripeForm').css("display", "block");
                    // clearCart();
                    // showCartItem();
                    // showProducts([]);
                },
                errors : function(response) {
                    console.log(response.responseText);
                }
            });
        }

        loadProduct();
    </script>
@endsection