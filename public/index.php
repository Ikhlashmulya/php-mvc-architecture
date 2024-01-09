<?php

session_start();

require_once(__DIR__ . '/../vendor/autoload.php');

use Ikhlashmulya\Phpweb\Config\Router;
use Ikhlashmulya\Phpweb\Controller\HomeController;
use Ikhlashmulya\Phpweb\Controller\TodoController;
use Ikhlashmulya\Phpweb\Controller\UserController;
use Ikhlashmulya\Phpweb\Middleware\AuthMiddleware;

$router = new Router();

$router->add('GET', '/', [HomeController::class, 'index'], [AuthMiddleware::class]);
$router->add('GET', '/login', [UserController::class, 'login']);
$router->add('POST', '/login', [UserController::class, 'doLogin']);
$router->add('GET', '/register', [UserController::class, 'register']);
$router->add('POST', '/register', [UserController::class, 'doRegister']);
$router->add('GET', '/logout', [UserController::class, 'doLogout'], [AuthMiddleware::class]);
$router->add('POST', '/todo', [TodoController::class, 'store'], [AuthMiddleware::class]);
$router->add('GET', '/todo/:id/delete', [TodoController::class, 'remove'], [AuthMiddleware::class]);

$router->run();