<?php
/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 31/10/2017
 * Time: 14:05
 */

namespace Core\Table;

use Core\Database\Database;

Class Table{

    protected $table;
    protected $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
        if(is_null($this->table)){
            $parts = explode('\\', get_class($this));
            $class_name = end($parts);
            $this->table = strtolower(str_replace('Table', '', $class_name));
        }
    }

    public function all(){
        return $this->query('SELECT * FROM ' . $this->table);
    }

    public function create(){

    }

    public function query($sql, $attributes = null, $one = false){
        if($attributes){
            return $this->db->prepare($sql, $attributes, str_replace('Table', 'Entity', get_class($this)), $one);
        }
        else{
            return $this->db->query($sql, str_replace('Table', 'Entity', get_class($this)), $one);
        }
    }

    public function getLastId($name)
        {
            return $this->db->getPDO()->lastInsertId($name);
        }
}