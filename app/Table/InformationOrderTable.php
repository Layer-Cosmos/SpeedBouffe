<?php

/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 31/10/2017
 * Time: 15:22
 */

namespace App\Table;

use Core\Table\Table;

class InformationOrderTable extends Table
{
    /**
     * @param InformationOrder $info_order
     * @param Buyer            $buyer
     * @return integer
     */
    public function insertInformationOrder($info_order, $buyer)
    {
        $buyer_id = $buyer->getClientId();
        /*$id       = $this->infoOrderId($info_order);
        if ($id !== -1) {
            return $id;
        }*/

        $attributes = [];
        array_push($attributes, $info_order->getDay());
        array_push($attributes, $info_order->getTime());
        array_push($attributes, $info_order->getCash());
        array_push($attributes, $buyer_id);
        $this->query("INSERT INTO info_order SET order_day = ?, delivery_time = ?, cash = ?, buyer_id_fk = ?", $attributes, true);
        //return parent::getLastId('info_order_id');
    }//end insertInformationOrder()
}