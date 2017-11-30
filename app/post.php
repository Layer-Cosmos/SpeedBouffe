<?php
/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 24/10/2017
 * Time: 16:39
 */

//require 'App.php';

require dirname(__DIR__) . '/vendor/autoload.php';

//var_dump($_SERVER['REQUEST_METHOD']);

//var_dump($_POST);


/*$entryData = array(
    'Civilite' => $datas->Acheteur->Civilite
, 'Nom'    => $datas->Acheteur->Nom
, 'Prenom'  => $datas->Acheteur->Prenom
, 'Age'     => $datas->Acheteur->Age
);*/


/*$context = new ZMQContext();
//var_dump($context);
$socket = $context->getSocket(ZMQ::SOCKET_PUSH, 'my pusher');
$socket->connect("tcp://localhost:5555");

//$socket->send(json_encode($entryData));

//$socket->disconnect();
*/
$router = new \App\Router\Router($_GET['url']);

$router->get('/Home/', "PostsController", "index");
$router->get('/Stats/', "StatsController", "index");
$router->get('/Commande/', "PostsController", "commande");
$router->post('/Commande/', "PostsController", "commande");

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

