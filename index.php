<?php
require_once "vendor/autoload.php";

use APP\Sessions;

$session = new Sessions();
$session->start();

$issetUser = $session->get('user_id');

print_r($_SESSION);

if ($issetUser) {
    echo "Управление новостями<br /> ";
    echo "<a href='#'>Создать новость</a>";
} else {
    echo "<a href='loginForm.php'>Login</a> | ";
    echo "<a href='registerForm.php'>Register</a>";
}


