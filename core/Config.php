<?php

/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 25/10/2017
 * Time: 16:07
 */

namespace Core;

class Config
{

    private $setting = [];
    private static $_instance;

    public static function getInstance($file){
        if(is_null(self::$_instance)){
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    public function get($key){
        if(!isset($this->setting[$key])){
            return null;
        }
        return $this->setting[$key];
    }

    public function __construct($file){
        $this->setting = require($file);
    }

}