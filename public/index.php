<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;
use App\Services\Routing\RouterFactory;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__.'/../vendor/autoload.php';

/** @var ContainerBuilder $container */
$container = require_once __DIR__.'/../bootstrap/container.php';

/** @var RouterFactory $routerFactory */
$routerFactory = $container->get('routing.router_factory');
$router = $routerFactory->make();
$route = $router->getMatchingRoute($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

if(!$route) {
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
    return;
}

$controllerMethod = $route->getControllerMethod();

$controller = $container->get($route->getController());
$response = $controller->$controllerMethod();

header('Content-type: application/json');
echo json_encode(['data' => $response]);
