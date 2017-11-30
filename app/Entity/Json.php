<?php
/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 28/11/2017
 * Time: 22:36
 */

namespace App\Entity;


class Json
{

    /**
     * @var string
     */
    private $json_data;

    /*private function orderToObject($order, $idx)
    {
        $ret = new Order();
        return $ret;
    }//end orderToObject()*/

    /**
     * @param string $json
     */
    public function __construct($json)
    {
        $this->json_data = json_decode($json, true);

    }//end __construct()

    /**
     * @return Order[]
     */
    public function getOrders()
    {
        $idx    = 0;
        $orders = $this->json_data['Details_commande'];

        //var_dump($orders);
        $ret    = [];
        foreach ($orders as $order) {

            //var_dump($order);
            $cur_order = new OrderEntity();
            $cur_order->setProperties($order['Commande'.$idx]);
            array_push($ret, clone $cur_order);
            $idx++;
        }
        return $ret;
    }//end getOrders()

    public function getBuyer($client_id)
    {
        $ret = new BuyerEntity($client_id);
        $json_data = $this->json_data['Acheteur'];
        $ret->setProperties($json_data);
        return $ret;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        $ret       = new ClientEntity();
        $json_data = $this->json_data['Acheteur'];
        $ret->setProperties($json_data);
        return $ret;
    }//end getClient()

    /**
     * @return InformationOrder
     */
    public function getOrderInformation()
    {
        $ret = new InformationOrderEntity();
        $ret->setProperties($this->json_data['Infos_commande']);
        return $ret;
    }//end getOrderInformation()
}