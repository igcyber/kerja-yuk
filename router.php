<?php

class Router {
    protected $routes = [];

    public function registerRoute($method, $uri, $controller){
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];
    }

    /**
     * Add Route GET
     * @param string $uri
     * @param string $controller
     * 
     * @return void
    */
    public function get($uri, $controller){
       $this->registerRoute('GET', $uri, $controller);
    }


    /**
     * Add Route POST
     * @param string $uri
     * @param string $controller
     * 
     * @return void
    */
    public function post($uri, $controller){
        $this->registerRoute('POST', $uri, $controller);
    }


    /**
     * Add Route PUT
     * @param string $uri
     * @param string $controller
     * 
     * @return void
    */
    public function put($uri, $controller){
        $this->registerRoute('PUT', $uri, $controller);
    }


    /**
     * Add Route DELETE
     * @param string $uri
     * @param string $controller
     * 
     * @return void
     */
    public function delete($uri, $controller){
        $this->registerRoute('DELETE', $uri, $controller);
    }


    /**
     * @param int $httpCode
     * 
     * @return void
     */
    public function error($httpCode = 404){
        http_response_code($httpCode);
        loadView('errors/' . $httpCode);
        exit;
    }


    /**
     * Route Request
     * @param string $uri
     * @param string $method
     * 
     * @return void
     */
    public function route($uri, $method)
    {
        foreach($this->routes as $route){
            if($route['uri'] === $uri && $route['method'] === $method){
                return require basePath($route['controller']);
            }
        }

        $this->error();
    }


}