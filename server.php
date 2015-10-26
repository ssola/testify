<?php
require 'vendor/autoload.php';

$app = new \Testify\Testify(new \Testify\CommandHandler());
$loop = React\EventLoop\Factory::create();
$socket = new React\Socket\Server($loop);

// This event triggers every time a new connection comes in
$socket->on('connection', function ($conn) use ($app) {
    $conn->write($app->welcome());

    $conn->on('data', function ($data, $conn) use ($app) {
        $app->handle($data, $conn);
    });
});

// Listen on port 1337
$socket->listen(1337);

$loop->run();