<?php
/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 25/10/2017
 * Time: 16:54
 */

namespace App\Router;


class Route
{

    private $path;
    private $controller;
    private $callable;

    public function __construct($path, $controller, $callable){

        $this->path = trim($path, '/');
        $this->controller = $controller;
        $this->callable = $callable;
    }

    public function match($url){
        $url = trim($url, '/');

        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $regex = "#^$path$#i";

        if(!preg_match($regex, $url, $matches)){
            return false;
        }
        return true;

    }

    public function call(){


        $controller = "App\\Controller\\$this->controller";
        $controller = new $controller();
        $action = $this->callable;
        //var_dump($action);
        return $controller->$action();

    }


}