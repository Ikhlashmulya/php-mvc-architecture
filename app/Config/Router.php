<?php

namespace Ikhlashmulya\Phpweb\Config;

use Ikhlashmulya\Phpweb\Middleware\Middleware;

class Router
{
    protected array $routes = [];

    public function add(string $method, string $url, array $handler, array $middlewares = [])
    {
        $this->routes[] = [
            'method' => $method,
            'url' => $url,
            'handler' => $handler,
            'middlewares' => $middlewares
        ];
        return $this;
    }

    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = $_SERVER['REQUEST_URI'];

        foreach ($this->routes as $route) {
            $pattern = preg_replace('/\/:([^\/]+)/', '/(?P<$1>[^/]+)', $route['url']);
            if (
                $method === $route['method'] &&
                preg_match('#^' . $pattern . '$#', $url, $matches)
            ) {
                // execute middleware
                foreach ($route['middlewares'] as $middleware) {
                    $instanceMiddleware = new $middleware();
                    if ($instanceMiddleware instanceof Middleware) {
                        $instanceMiddleware->handle();
                    }
                }

                $route['handler'][0] = new $route['handler'][0]; // instance controller
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY); //get params
                call_user_func_array($route['handler'], $params); // execute
                return;
            }
        }

        http_response_code(404);
        echo ("PAGE NOT FOUND");
    }
}
