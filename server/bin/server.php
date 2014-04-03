<?php

use Ratchet\Server\IoServer;
use GameServer\Server;

require './vendor/autoload.php';

$server = IoServer::factory(
    new Server(),
    8080
);

$server->run();
