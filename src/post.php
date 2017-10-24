<?php
/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 24/10/2017
 * Time: 16:39
 */

$data = file_get_contents("php://input");
$datas = json_decode($data);

$entryData = array(
    'Civilite' => $datas->Acheteur->Civilite
    , 'Nom'    => $datas->Acheteur->Nom
    , 'Prenom'  => $datas->Acheteur->Prenom
    , 'Age'     => $datas->Acheteur->Age
);


$context = new ZMQContext();
$socket = $context->getSocket(ZMQ::SOCKET_PUSH, 'my pusher');
$socket->connect("tcp://localhost:5555");

$socket->send(json_encode($entryData));

