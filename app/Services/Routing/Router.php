<?php

namespace App\Services\Routing;

/**
 * Class Router
 * @package App\Services\Routing
 */
class Router
{
    /**
     * @var Route[]
     */
    protected array $routes = [];

    /**
     * @param Route $route
     */
    public function addRoute(Route $route): void
    {
        $this->routes[] = $route;
    }

    /**
     * @param string $path
     * @param string $httpMethod
     * @return Route|null
     */
    public function getMatchingRoute(string $path, string $httpMethod): ?Route
    {
        foreach ($this->routes as $route) {
            if ($route->getPath() !== $path) {
                continue;
            }

            if ($route->getHttpMethod() !== $httpMethod) {
                continue;
            }

            return $route;
        }

        return null;
    }
}
