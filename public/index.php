<?php

require_once(__DIR__ . '/../vendor/autoload.php');

use Ikhlashmulya\Phpweb\Application\Router;
use Ikhlashmulya\Phpweb\Application\Response;
use Ikhlashmulya\Phpweb\Controller\HomeController;
use Ikhlashmulya\Phpweb\Controller\UserController;
use Ikhlashmulya\Phpweb\Middleware\AuthMiddleware;

$router = new Router();

$router->add('GET', '/', [HomeController::class, 'index']);
$router->add('GET', '/user/:id', [UserController::class, 'show'], [AuthMiddleware::class]);

$router->run();