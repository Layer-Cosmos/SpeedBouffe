<?php
/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 26/10/2017
 * Time: 14:39
 */

namespace App\Controller;

use App\App;
use App\Entity\BuyerEntity;
use App\Entity\Json;
use App\Table\ClientTable;

class PostsController extends AppController{

    public function index(){


        $nonTreatedOrders = App::getInstance()->getTable('order')->getNonTreatedOrders();
        $this->render('posts.index', compact('nonTreatedOrders'));

    }

    public function commande(){
        $data = file_get_contents("php://input");
        //$datas = json_decode($data);

        //print_r($data);

        $json_obj = new Json($data);

        $client = $json_obj->getClient();

        $client_id = App::getInstance()->getTable('client')->insertClient($client);

        $buyer = $json_obj->getBuyer($client_id);

        $buyer_id = App::getInstance()->getTable('buyer')->insertBuyer($buyer);

        $info_order = $json_obj->getOrderInformation();

        App::getInstance()->getTable('informationOrder')->insertInformationOrder($info_order, $buyer);

        //var_dump($buyer);


        //var_dump($client);

        //$buyer = new BuyerEntity();

        //var_dump($buyer);

        //var_dump($info_order);

        $orders = $json_obj->getOrders();

        foreach ($orders as $order) {
            App::getInstance()->getTable('order')->insertOrder($order, $info_order, $client_id);
        }

        //var_dump($orders);

        $entryData = array('Commande' => 'done');
        array_push($entryData, $client);
        array_push($entryData, $info_order);
        array_push($entryData, $orders);

        //var_dump($entryData);
        //var_dump(json_encode($entryData));




        /*$entryData = array(
            'Civilite' => $datas->Acheteur->Civilite
        , 'Nom'    => $datas->Acheteur->Nom
        , 'Prenom'  => $datas->Acheteur->Prenom
        , 'Age'     => $datas->Acheteur->Age
        );*/

        $context = new \ZMQContext();
        $socket = $context->getSocket(\ZMQ::SOCKET_PUSH, 'my pusher');
        $socket->connect("tcp://localhost:5555");
        $socket->send(json_encode($entryData));
    }

}