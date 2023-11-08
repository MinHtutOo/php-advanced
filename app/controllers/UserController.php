<?php 

namespace App\Controllers;

use App\Classes\Auth;
use App\Classes\CSRFToken;
use App\Classes\Redirect;
use App\Classes\Request;
use App\Classes\Session;
use App\Classes\ValidateRequest;
use App\Models\User;

class UserController
{
    public function showLoginForm()
    {
        if(Auth::check()) {
            Redirect::to("/E-Commerce/public/cart");
        }else {
            return view("user/login");
        }
    }

    public function login()
    {
        $post = Request::get("post");
        if(CSRFToken::checkToken($post->token)) {
            $user = User::where("email", $post->email)->first();
            if($user) {
                if(password_verify($post->password, $user->password)) {
                    Session::add("user_id", $user->id);
                    if(Auth::user()->is_admin === 1) {
                        Redirect::to("/E-Commerce/public/admin");
                    }else {
                        Redirect::to("/E-Commerce/public/cart");
                    }
                } else {
                    Session::flash("error_message","Incorrect Password!");
                    Redirect::to("/E-Commerce/public/user/login"); 
                }
            }else {
                Session::flash("error_message","No user with that name!");
                Redirect::to("/E-Commerce/public/user/login");
            }
        }else {
            Session::flash("error_message","Token Mis Match Error!");
            Redirect::to("/E-Commerce/public/user/login");
        }
    }

    public function showRegisterForm()
    {
        return view("user/register");
    }

    public function register()
    {
        $post = Request::get("post");
        // beautify($post);
        if(CSRFToken::checkToken($post->token)) {
            if($post->password === $post->confirm_password) {
                $rules = [
                    "name" => ["minLength" => "5"],
                    "email" => ["unique" => "users"],
                    "password" => ["minLength"=> "5"]
                ];
                $validator = new ValidateRequest();
                $validator->checkVaidate($post, $rules);
                if ($validator->hasError()) {
                    beautify($validator->getErrors());
                }else {
                    $users = new User();
                    $users->name = $post->name;
                    $users->email = $post->email;   
                    $users->password = password_hash($post->password, PASSWORD_BCRYPT);

                    if($users->save()) {
                        Session::flash("success_message","Register Success! Please Login.");
                        Redirect::to("/E-Commerce/public/user/login");
                    }else{
                        Session::flash("error_message","Database problem.Contact to admin!");
                        Redirect::to("/E-Commerce/public/user/register");
                    }
                }
            } else {
                Session::flash("error_message","Password Do Not Match!");
                Redirect::to("/E-Commerce/public/user/register");
            }
        }else {
            Session::flash("error_message","Token Mis Match Error!");
            Redirect::to("/E-Commerce/public/user/register");
        }
    }

    public function logout() {
        Session::remove("user_id");
        Redirect::to("/E-Commerce/public/");
    }
}

?>