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
    private $callable;

    public function __construct($path, $callable){

        $this->path = $path;
        $this->callable = $callable;
    }

    public function call(){


        $controller = "App\\Controller\\Controller";
        $controller = new $controller();
        $action = $this->callable;
        //var_dump($action);
        return $controller->$action();

    }


}