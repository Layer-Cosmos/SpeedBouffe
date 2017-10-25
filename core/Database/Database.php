<?php
/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 25/10/2017
 * Time: 16:14
 */

namespace Core\Database;

use \PDO;

class Database{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    public function getPDO()
    {
        if ($this->pdo === null){
            $pdo = new PDO("mysql:dbname=marmiton;host=localhost", 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;

    }

    public function query($sql, $class_name = null, $one = false)
    {
        $req = $this->getPDO()->query($sql);
        if($class_name === null){
            $req->setFetchMode(PDO::FETCH_OBJ);
        }
        else{
            $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        }
        if($one){
            $datas = $req->fetch();
        }
        else{
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    public function prepare($sql, $attributes, $class_name, $one = false)
    {
        $req = $this->getPDO()->prepare($sql);
        $res = $req->execute($attributes);
        if(
            strpos($sql, 'UPDATE') === 0 ||
            strpos($sql, 'INSERT') === 0 ||
            strpos($sql, 'DELETE') === 0
        ){
            return $res;
        }
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if($one){
            $datas = $req->fetch();
        }
        else{
            $datas = $req->fetchAll();
        }

        return $datas;
    }

    public function exec($sql)
    {
        $req = $this->getPDO()->exec($sql);

        return $req;
    }
}
?>