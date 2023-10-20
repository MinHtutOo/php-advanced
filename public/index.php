<?php

// use App\Classes\Mail;

use App\Classes\Session;
use App\Classes\ValidateRequest;
use App\Controllers\CategoryController;

require_once "../boostrap/init.php";

/* check validation start
$post = [
    "name"=>"Bruce Lee",
    "age"=>20,
    "email"=>"tester1@gmail.com"
];

$policy = [
    "name" => ["string"=>true, "minLength"=>"5"],
    "age" => ["number"=>true, "minLength"=>"2"],
    "email"=> ["email"=>true, "maxLength"=> "25"]
];

$validator = new ValidateRequest();
$validator->checkVaidate($post,$policy);

if($validator->hasError()) {
    beautify($validator->getErrors());
}else {
    echo "Good To Go!";
}
check validation end */

/* mail function start
$mailer = new Mail();
$content = "Hello! The PHP mail() function usually sends via a local mail server, typically fronted by a sendmail binary on Linux, BSD, 
        and macOS platforms, however, Windows usually doesn't include a local mail server; PHPMailer's integrated SMTP client allows email sending on all platforms without needing a local mail server. 
        Be aware though, that the mail() function should be avoided when possible; it's both faster and safer to use SMTP to localhost.";
$data = [
    "to"=>"minhtut2123@gmail.com",
    "to_name"=>"minhtut",
    "content"=>$content,
    "subject"=>"New Mail Testing For E-commerce Project.",
    "filename"=>"welcome",
    "img_link"=>"https://images.squarespace-cdn.com/content/v1/5272f3ece4b0b2696c2b5fe7/1392834823365-6D4ZLN5DOK4DJIH5V9XK/81e36ced8b9c22406d05516c6903dbae.jpg"
]; 

// if($mailer->send($data))
//     echo "<br><h1>Mail Send Successfully</h1>";
// else
//     echo "<br><h1>Mail Send Fail</h1>";
mail function end*/




?>