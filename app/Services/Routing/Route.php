<?php

namespace App\Services\Routing;

/**
 * Class Route
 * @package App\Services\Routing
 */
class Route
{
    /**
     * @var string
     */
    protected string $path;

    /**
     * @var string
     */
    protected string $controller;

    /**
     * @var string
     */
    protected string $controllerMethod;

    /**
     * @var string
     */
    protected string $httpMethod = 'GET';

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * @param string $controller
     */
    public function setController(string $controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @return string
     */
    public function getControllerMethod(): string
    {
        return $this->controllerMethod;
    }

    /**
     * @param string $controllerMethod
     */
    public function setControllerMethod(string $controllerMethod): void
    {
        $this->controllerMethod = $controllerMethod;
    }

    /**
     * @return string
     */
    public function getHttpMethod(): string
    {
        return $this->httpMethod;
    }

    /**
     * @param string $httpMethod
     */
    public function setHttpMethod(string $httpMethod): void
    {
        $this->httpMethod = $httpMethod;
    }
}
