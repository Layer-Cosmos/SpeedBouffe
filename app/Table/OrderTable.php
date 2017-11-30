<?php

/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 31/10/2017
 * Time: 15:11
 */

namespace App\Table;

use App\App;
use App\Entity\ClientEntity;
use App\Entity\OrderEntity;
use Core\Table\Table;

class OrderTable extends Table
{
    public function insertOrder($order, $info_order)
    {
        //$client_id     = $this->clientIdOrder($order);

        $client_id = App::getInstance()->getTable('client')->clientIdOrder($order);

        $info_order_id = $this->infoOrderId($info_order);
        $attributes = [];
        array_push($attributes, false);
        array_push($attributes, $order->getMeal());
        array_push($attributes, $order->getEntre());
        array_push($attributes, $order->getDessert());
        array_push($attributes, $order->getRate());
        array_push($attributes, $info_order_id);
        array_push($attributes, $client_id);
        //array_push($attributes, getPriceId($order->getRate()));
        $this->query("INSERT INTO `order` SET treated = ?, meal = ?, entre = ?, dessert = ?, rate = ?, info_order_id_fk = ?, client_id_fk = ?", $attributes, false);
        //$this->query("INSERT INTO client SET buyer_id_fk = ?, gender = ?, name = ?, first_name = ?, age = ?", $attributes, true);


        //return $this->getLastId('order_id');

    }

    private function infoOrderId($info_order)
    {
        $ret = -1;
        $attributes = [];
        array_push($attributes, $info_order->getDay());
        array_push($attributes, $info_order->getTime());
        $id = $this->query("SELECT info_order_id FROM info_order WHERE DATEDIFF(order_day, ?) = 0 AND TiMEDIFF(delivery_time, ?) = 0", $attributes, true);

        if ($id !== false) {
            $ret = $id->info_order_id;
        }
        return $ret;
    }//end infoOrderId()

    public function getNbOrdersMalePerMeal()
    {
        $plats = $this->query("SELECT meal, COUNT(meal) AS `Plats`
                            FROM `order`
                            INNER JOIN client
                            ON client.client_id = `order`.client_id_fk
                            WHERE client.gender = 0
                            GROUP BY meal", false);
        $nbPlats = 0;
        foreach($plats as $plat){

            $nbPlats += $plat->Plats;
        }

        return $nbPlats;

        //return $this->query("SELECT *, MIN(order_id) FROM `order` ");



    }//end getNbOrdersMalePerMeal()

    public function getNbOrdersFemalePerMeal()
    {
        $plats = $this->query("SELECT meal, COUNT(meal) AS `Plats`
                            FROM `order`
                            INNER JOIN client
                            ON client.client_id = `order`.client_id_fk
                            WHERE client.gender = 1 OR client.gender = 2
                            GROUP BY meal", false);

        $nbPlats = 0;
        foreach($plats as $plat){

            $nbPlats += $plat->Plats;
        }

        return $nbPlats;




    }//end getNbOrdersMalePerMeal()

    public function getNbOrdersAgePerMeal($min, $max)
    {
        //$sql = 'SELECT meal, COUNT(meal) AS `Plats` FROM `order` INNER JOIN client ON client.client_id = `order`.client_id_fk WHERE client.age >= ? AND client.age <= ? GROUP BY meal';
        $attributes = [];
        array_push($attributes, $min);
        array_push($attributes, $max);
        $ages = $this->query("SELECT meal, COUNT(meal) AS `Age`
                            FROM `order`
                            INNER JOIN client
                            ON client.client_id = `order`.client_id_fk
                            WHERE client.age >= ? AND client.age <= ?
                            GROUP BY meal", $attributes, false);

        $nbAges = 0;
        foreach($ages as $age){

            $nbAges += $age->Age;
        }
        return $nbAges;
        //return parent::prepare($sql, $attributes, '');
    }//end getNbOrdersAgePerMeal()

    public function getNbOrdersPerMeal()
    {
        //$sql = 'SELECT meal, COUNT(meal) AS `Plats` FROM `order` GROUP BY meal';

        return $this->query("SELECT meal, COUNT(meal) AS `Plats` FROM `order` GROUP BY meal", false);

    }//end getNbOrdersPerMeal()


    public function getNbMealPerDeliveryTime()
    {
        //$sql = 'SELECT delivery_time, COUNT(meal) AS `Plats` FROM `order` INNER JOIN info_order ON info_order.info_order_id = `order`.info_order_id_fk GROUP BY delivery_time';
        return $this->query("SELECT delivery_time, COUNT(meal) AS `Plats` FROM `order` INNER JOIN info_order ON info_order.info_order_id = `order`.info_order_id_fk GROUP BY delivery_time", false);
        //return parent::prepare($sql, null, '');
    }//end getNbMealPerDeliveryTime()


    public function getNbMealsPerBuyer()
    {
        //$sql = 'SELECT DISTINCT meal, email, COUNT(meal) AS `Plats` FROM buyer INNER JOIN info_order ON buyer.buyer_id = info_order.buyer_id_fk INNER JOIN `order` ON info_order.info_order_id = order.info_order_id_fk GROUP BY email, meal';
        return $this->query("SELECT DISTINCT meal, email, COUNT(meal) AS `Plats`
                             FROM buyer INNER JOIN info_order
                             ON buyer.buyer_id = info_order.buyer_id_fk INNER JOIN `order`
                             ON info_order.info_order_id = order.info_order_id_fk GROUP BY email, meal", false);


        //return parent::prepare($sql, null, '');
    }//end getNbMealsPerBuyer()

    public function getNonTreatedOrders()
    {
        return $this->query("SELECT * FROM `order` WHERE treated = false", false);

    }//end getNonTreatedOrders()
    public function getMealsEntre($meals)
    {

        $entres = [];
        foreach($meals as $meal){

            $attributes = [];
            array_push($attributes, $meal->meal);
            array_push($entres, $this->query("SELECT entre FROM `order`
                               WHERE meal = ?
                               GROUP BY entre ORDER BY COUNT(entre) DESC LIMIT 1", $attributes, true));

        }

        return $entres;
    }
    public function getMealsDessert($meals)
    {
        //var_dump($meals);

        $dessert = [];
        foreach($meals as $meal){

            $attributes = [];
            array_push($attributes, $meal->meal);
            array_push($dessert, $this->query("SELECT dessert FROM `order`
                               WHERE meal = ?
                               GROUP BY dessert ORDER BY COUNT(dessert) DESC LIMIT 1", $attributes, true));

        }

        return $dessert;


    }//end getNonTreatedOrders()

    public function getBest()
    {

        $meals = $this->getNbOrdersPerMeal();
        $entre = $this->getMealsDessert($meals);
        $dessert = $this->getMealsDessert($meals);

        //var_dump($meals);

        $dessert = [];
        foreach($meals as $meal){

            $attributes = [];
            array_push($attributes, $meal->meal);
            array_push($dessert, $this->query("SELECT dessert FROM `order`
                               WHERE meal = ?
                               GROUP BY dessert ORDER BY COUNT(dessert) DESC LIMIT 1", $attributes, true));

        }

        var_dump($dessert);

        return $dessert;


    }//end getNonTreatedOrders()



}