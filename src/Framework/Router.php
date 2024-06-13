<?php




declare(strict_types=1);

// Router is responsible to running a controller
// It is also execute a middleware before a controller is invoked.

namespace Framework;

class Router
{
    private array $routes = [];
    private array $middlewares = [];

    public function add(string $method, string $path, array $controller)
    {
        $path = $this->normalizePath($path);

        $this->routes[] = [
            'path' => $path,
            'method'=> strtoupper($method),
            'controller'=> $controller
        ];
    }

    private function normalizePath(string $path): string
    {
        $path = trim($path, '/');
        $path = "/{$path}/";
        $path = preg_replace('#[/]{2,}#', '/', $path);
        
        return $path;
    }

    public function dispatch(string $path, string $method, Container $container = null)
    {
        $path = $this->normalizePath($path);
        $method = strtoupper($method);

        foreach ($this->routes as $route)
        {

            if (
                !preg_match("#^{$route['path']}$#", $path) ||
                $route['method'] !== $method
            ) {
                continue;
            }

            [$class, $function] = $route['controller'];
            $controllerInstance = $container ?
                $container->resolve($class) :
                new $class;
            $controllerInstance->$function(); // or $controllerInstance->{$function}();
        }
    }

    public function addMiddleware(string $middleware)
    {
        // Middlewares is going to define as classes:
        // It is also needed to have access to the container to inject dependencies.
        //    Controllers aren't only class to require dependencies

        $this->middlewares[] = $middleware;
    }
}