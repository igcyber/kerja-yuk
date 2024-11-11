<?php

namespace Framework;
use App\Controllers\ErrorController;

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
     * Route Request
     * @param string $uri
     * @param string $method
     * 
     * @return void
     */
    public function route($uri)
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach($this->routes as $route){
    
            //split the current URI into segments
            $uriSegments = explode('/', trim($uri, '/'));
            
            //split the route URI into segments
            $routeSegments = explode('/', trim($route['uri'], '/'));
    
            $match = true;

            //check if the number of segments matches between uri and route
            if(count($uriSegments) === count($routeSegments) && strtoupper($route['method'] === $requestMethod)){
                $params = [];
                $match = true;
                for($i = 0; $i < count($uriSegments); $i++){
                    //if the uri's do not match and no param
                    if($routeSegments[$i] !== $uriSegments[$i] && !preg_match('/\{(.+?)\}/', $routeSegments[$i])){
                        $match = false;
                        break;
                    }

                    //check for the params and add to $params array
                    if(preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)){
                        $params[$matches[1]] = $uriSegments[$i];
                    }
                }

                if($match){
                    //  extract controller and controller method
                    $controller = 'App\\Controllers\\' . $route['controller'];
                    $controllerMethod = $route['controllerMethod'];   
                    
                    // instantiate controller class and call the method
                    $controllerInstance = new $controller();
                    $controllerInstance->$controllerMethod($params);
                    
                    return ;
                }
                
            }
        }

        ErrorController::notFound();
    }


}