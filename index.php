<?php
require_once "vendor/autoload.php";

use APP\controllers\authController;
use APP\controllers\indexControllers;
use APP\Router;


Router::route('/', [indexControllers::class, 'index']);
Router::route('/login', [AuthController::class, 'loginForm']);
Router::route('/do-login', [AuthController::class, 'login']);
Router::route('/register', [AuthController::class, 'registerForm']);
Router::route('/do-register', [AuthController::class, 'register']);;
Router::execute();

