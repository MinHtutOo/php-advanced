@extends("layout.master")

@section("title", "Payment Success")

@section("content")
    <div class="container my-5">
        <h1 class="text-success english">Payment Success</h1>
        <a href="/E-Commerce/public">Go Back Home</a>
    </div>
@endsection

@section("script")
    <script>
        localStorage.removeItem('products');
        localStorage.removeItem('items');
    </script>
@endsection