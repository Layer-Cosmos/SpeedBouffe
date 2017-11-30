<?php
/**
 * Created by PhpStorm.
 * User: Layer
 * Date: 24/10/2017
 * Time: 16:48
 */
    require dirname(__DIR__) . '/vendor/autoload.php';

    $loop   = React\EventLoop\Factory::create();

    $pusher = new MyApp\Serveur\Pusher();

    // Listen for the web server to make a ZeroMQ push after an ajax request
    $context = new React\ZMQ\Context($loop);
    $pull = $context->getSocket(ZMQ::SOCKET_PULL);
    $pull->bind('tcp://127.0.0.1:5555'); // Binding to 127.0.0.1 means the only client that can connect is itself
    $pull->on('message', array($pusher, 'onBlogEntry'));

    // Set up our WebSocket server for clients wanting real-time updates
    var_dump($pusher);
    $webSock = new React\Socket\Server('0.0.0.0:8080', $loop); // Binding to 0.0.0.0 means remotes can connect
    $webServer = new Ratchet\Server\IoServer(
        new Ratchet\Http\HttpServer(
            new Ratchet\WebSocket\WsServer(
                new Ratchet\Wamp\WampServer(
                    $pusher
                )
            )
        ),
        $webSock
    );


    /*$webSock = new React\Socket\Server('0.0.0.0:8080', $loop); // Binding to 0.0.0.0 means remotes can connect
    $webServer = new Ratchet\Server\IoServer(
        new Ratchet\Http\HttpServer(
            new Ratchet\WebSocket\WsServer(
                new MyApp\Serveur\Chat(
                )
            )
        ),
        $webSock
    );*/


    $loop->run();