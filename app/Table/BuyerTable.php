<?php

/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 31/10/2017
 * Time: 15:21
 */

namespace App\Table;

use Core\Table\Table;

class BuyerTable extends Table
{
    public function lastId($name)
        {
            return $this->getLastId($name);
        }

    public function insertBuyer($buyer)
        {
            $id = $this->buyerId($buyer);
            if ($id !== -1) {
                return $id;
            }
            $attributes = [];
            array_push($attributes, $buyer->getClientId());
            array_push($attributes, $buyer->getEmail());

            //var_dump($attributes);

            $this->query("INSERT INTO buyer SET client_id_fk = ?, email = ?", $attributes, true);

            $buyer_id = $this->getLastId('buyer_id');

            $this->setBuyerId($buyer->getClientId(), $buyer_id);

        }//end insertClient()

    private function setBuyerId($client_id, $buyer_id)
    {
        $attributes = [];
        array_push($attributes, $buyer_id);
        array_push($attributes, $client_id);
        $this->query("UPDATE client SET buyer_id_fk = ? WHERE client_id = ?", $attributes, true);

    }//end setBuyerId()

    private function buyerId($buyer){
        $ret = -1;
        $attributes = [];
        array_push($attributes, $buyer->getEmail());
        $id = $this->query("SELECT buyer_id FROM buyer WHERE email = ?", $attributes, true);

        if ($id !== false) {
            $ret = $id->buyer_id;
        }

        return $ret;
    }
}