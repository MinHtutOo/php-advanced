@extends("layout.master")

@section("title", "User Login")

@section("content")
    <div class="container my-5">
        <div class="col-md-8 offset-md-2">
        <h1>User Login</h1>
        @if(\App\Classes\Session::has("success_message"))
            {{\App\Classes\Session::flash("success_message")}}
        @endif

        @if(\App\Classes\Session::has("error_message"))
            {{\App\Classes\Session::flash("error_message")}}
        @endif
        
            <form action="<?php echo URL_ROOT . 'user/login'; ?>" method="post">
                <input type="hidden" name="token" value="{{App\Classes\CSRFToken::_token()}}">

                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="mb-3 d-flex justify-content-between">
                    <span>
                        Not a member?
                        <a href="<?php echo URL_ROOT . 'user/register'; ?>">Register Here</a>
                    </span>
                    <span>
                        <button class="btn btn-outline-warning btn-sm">Cancel</button>
                        <button class="btn btn-primary btn-sm">Login</button>
                    </span>
                </div>
                
            </form>
        </div>
    </div>
   

@endsection