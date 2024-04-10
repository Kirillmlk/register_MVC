<?php
require_once "vendor/autoload.php";

use APP\Database;




$database = new Database();
$db = $database->connection();

if (false) {
    echo "Управление новостями<br /> ";
    echo "<a href='#'>Создать новость</a>";
} else {
    echo "<a href='loginForm.php'>Login</a> | ";
    echo "<a href='registerForm.php'>Register</a>";
}


