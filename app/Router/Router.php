<?php
/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 25/10/2017
 * Time: 16:35
 */

namespace App\Router;



class Router
{

    private $url;
    private $routes = [];

    public function __construct($url){
        $this->url = $url;
    }

    public function get($path, $controller, $callable){
        $route = new Route($path, $controller, $callable);
        $this->routes['GET'][] = $route;
        //var_dump($route);
    }

    public function post($path, $controller, $callable){
        $route = new Route($path, $controller, $callable);
        $this->routes['POST'][] = $route;
    }

    public function run(){
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])){
            return 'FAILED';
        }
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route){

            if($route->match($this->url)){
                return $route->call();
            }
        }
    }

}