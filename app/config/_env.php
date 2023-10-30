<?php

use Dotenv\Dotenv;

$dotenv = Dotenv::createUnsafeImmutable(APP_ROOT);

$dotenv->load();

require_once __DIR__ ."/_stripe.php";

?>