<?php
/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 15/10/2017
 * Time: 19:15
 */

/*require 'DatabaseK.php';

$db = new DatabaseK('pictlonis_db');

echo 'OK';
$data = file_get_contents("php://input");
$datas = json_decode($data);
print_r($datas);

foreach($datas->Acheteur as $acheteur){
    if($acheteur == 'Mademoiselle'){
        $acheteur = 2;
    }else if($acheteur == 'Madame'){
        $acheteur = 1;
    }else if($acheteur == 'Monsieur'){
        $acheteur = 0;
    }
    $buyer[] = $acheteur;
}

$db->prepare("INSERT INTO client set gender = ?, name = ?, first_name = ?, age = ?, email = ?", $buyer, get_class($datas), true);
$lastBuyer = $db->query("SELECT client_id FROM client ORDER BY client_id DESC LIMIT 1", null, true);
//var_dump($lastBuyer);
foreach($lastBuyer as $lastBuyers){
    $buyers[] = $lastBuyers;
    $db->prepare("INSERT INTO buyer set client_id_fk = ?", $buyers, get_class($lastBuyer), true);
}*/

use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use MyApp\Serveur\Chat;

    require dirname(__DIR__) . '/vendor/autoload.php';
    //require dirname(__DIR__) . '\MyApp\Chat.php';

    $server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new Chat()
        )
    ),
    8080
);

    $server->run();


/*foreach($datas->Info_commande as $info_commandes){
    $info_order[] = $info_commandes;
}*/

/*foreach($datas->Details_commande as $Details_commandes){
    foreach($Details_commandes as $commande){
        $order[] = $commande;
    }
}*/

//$db->prepare("INSERT INTO info_order set gender = ?, name = ?, first_name = ?, age = ?, email = ?", $buyer, get_class($datas), true);

//$db->prepare("INSERT INTO client set gender = ?, name = ?, first_name = ?, age = ?, email = ?", $buyer, get_class($datas), true);

