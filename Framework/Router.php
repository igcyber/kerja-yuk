<?php

namespace Framework;

class Router {
    protected $routes = [];

    /**
     * Add new route
     * @param string $method
     * @param string $uri
     * @param string $action
     * 
     * @return void
     */
    public function registerRoute($method, $uri, $action){
        //destructure array
        list($controller, $controllerMethod) = explode('@', $action);
 
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod
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
     * Get Error Page
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
                // extract controller and controller method
                $controller = 'App\\Controllers\\' . $route['controller'];
                $controllerMethod = $route['controllerMethod'];   
                
                // instantiate controller class and call the method
                $controllerInstance = new $controller();
                $controllerInstance->$controllerMethod();
                
                return ;
            }
        }

        $this->error();
    }


}