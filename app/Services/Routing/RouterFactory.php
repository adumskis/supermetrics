<?php

namespace App\Services\Routing;

use Symfony\Component\Yaml\Yaml;

/**
 * Class RouterFactory
 * @package App\Services\Routing
 */
class RouterFactory
{
    /**
     * @var string
     */
    protected string $appPath;

    /**
     * RouterFactory constructor.
     * @param string $appPath
     */
    public function __construct(string $appPath)
    {
        $this->appPath = $appPath;
    }

    /**
     * @return Router
     */
    public function make(): Router
    {
        $router = new Router();
        foreach ($this->getRoutes() as $route) {
            $router->addRoute($route);
        }

        return $router;
    }

    /**
     * @return Route[]
     */
    protected function getRoutes(): array
    {
        $routesData = Yaml::parseFile($this->appPath . '/services/routes.yaml');
        $routes = [];

        foreach ($routesData['routes'] as $routeData) {
            $route = new Route();

            [$controller, $controllerMethod] = explode('::', $routeData['controller']);
            $route->setPath($routeData['path']);
            $route->setController($controller);
            $route->setControllerMethod($controllerMethod);
            $route->setHttpMethod($routeData['method']);

            $routes[] = $route;
        }

        return $routes;
    }
}
