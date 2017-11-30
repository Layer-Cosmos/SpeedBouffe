<?php

/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 31/10/2017
 * Time: 15:21
 */

namespace App\Table;

use Core\Table\Table;

class ClientTable extends Table
{
    public function lastId($name)
        {
            return $this->getLastId($name);
        }

    public function insertClient($client)
        {
            $id = $this->clientId($client);
            if ($id !== -1) {
                return $id;
            }
            $attributes = [];
            array_push($attributes, null);
            array_push($attributes, $client->getGender());
            array_push($attributes, $client->getName());
            array_push($attributes, $client->getFirstName());
            array_push($attributes, $client->getAge());

            $this->query("INSERT INTO client SET buyer_id_fk = ?, gender = ?, name = ?, first_name = ?, age = ?", $attributes, true);

            $client->setId($this->getLastId('client_id'));

            return $client->getId();

        }//end insertClient()

    private function clientId($client){
        $ret = -1;
        $attributes = [];
        array_push($attributes, $client->getName());
        array_push($attributes, $client->getFirstName());
        $id = $this->query("SELECT client_id FROM client
                            WHERE name = ? AND first_name = ?",
                            $attributes, true);

        if ($id !== false) {
            $ret = $id->client_id;
        }

        return $ret;
    }

    public function clientIdOrder($order)
    {
        $name       = $order->getName();
        $first_name = $order->getFirstName();
        $age        = $order->getAge();
        $gender     = $order->getGender();

        $client = new \App\Entity\ClientEntity($name, $gender, $first_name, $age);
        return $this->insertClient($client);
    }//end clientIdOrder()
}