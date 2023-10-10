<?php

use App\Classes\Mail;

require_once "../boostrap/init.php";

$mailer = new Mail();
$content = "Hello! The PHP mail() function usually sends via a local mail server, typically fronted by a sendmail binary on Linux, BSD, 
        and macOS platforms, however, Windows usually doesn't include a local mail server; PHPMailer's integrated SMTP client allows email sending on all platforms without needing a local mail server. 
        Be aware though, that the mail() function should be avoided when possible; it's both faster and safer to use SMTP to localhost.";
$data = [
    "to"=>"minhtut2123@gmail.com",
    "to_name"=>"minhtut",
    "content"=>$content,
    "subject"=>"New Mail Testing For E-commerce Project.",
    "filename"=>"welcome"
]; 

// extract($data);
// echo $to_name;

if($mailer->send($data))
    echo "<br><h1>Mail Send Successfully</h1>";
else
    echo "<br><h1>Mail Send Fail</h1>";

?>