<?php
/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 24/10/2017
 * Time: 16:39
 */

require 'App.php';

App::load();

//var_dump($_SERVER['REQUEST_METHOD']);

//var_dump($_POST);

$router = new App\Router\Router($_GET['url']);

$router->get('/posts/', "show");
$router->post('/posts/', "show");

$router->run();


/*$datas = json_decode($data);

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

$socket->disconnect();*/

