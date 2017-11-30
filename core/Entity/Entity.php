<?php
/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 03/11/2017
 * Time: 14:44
 */

namespace Core\Entity;


class Entity
{
    public function __get($key){
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
}