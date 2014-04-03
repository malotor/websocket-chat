<?php

namespace GameServer;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Game;

class Server implements MessageComponentInterface {
    protected $clients;

    private $game;

    public function __construct() {
        $this->clients = new \SplObjectStorage;

        $this->game = new Game\Game();

        $this->commandProcessor = new CommandProcessor();
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {

        //Convert messate to JSON
        $jsonMsg = json_decode($msg,true);

        //var_dump($jsonMsg);
        /*
        try {a
            echo inverso(5) . "\n";
            echo inverso(0) . "\n";
        } catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
        */
        try {

            switch ($jsonMsg['command']) {
                case 'characterSay':
                    
                    $character = $this->game->getCharacter($from->resourceId);
                    if ($character) {
                        $command = "say";
                        $args[0] = $character;
                        $args[1] = $jsonMsg['msg'];
                        $response = CommandProcessor::execCommand($command,$args);
                        $this->sendMessageToAll($from, $response);

                    } else {
                        $this->sendMessageToAll($from, 'You must create a character firts');
                    }

                    break;

                case 'create':

                    $character = new Game\Character();
                    $characterName = $jsonMsg['msg'];
                    $character->setName($characterName);

                    $this->game->addCharacter($character,$from->resourceId);

                    $this->sendMessageToAll($from, $characterName . ' has joined the game');

                    break;

                case 'move':

                    $character = $this->game->getCharacter($from->resourceId);

                    $command = 'move';
                    $args[0] = $character;
                    $args[1] = $jsonMsg['x'];
                    $args[2] = $jsonMsg['y'];

                    $response = CommandProcessor::execCommand($command,$args);

                    $this->sendMessageToAll($from, $response);

                    break;

                case 'say':
                    $this->sendMessageToAll($from, $jsonMsg['msg']);
                    break;

                default:
                    $this->sendMessageToClient($from, 'Sorry! But the command doesn´t exists!');
                    break;
            }
        } catch (Exception $e) {
            $msg = 'Excepción capturada: ' . $e->getMessage();
            $this->sendMessageToClient($from, $msg);
        }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }

    protected function sendMessageToAll(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        foreach ($this->clients as $client) {
            if ($from !== $client) {
                // The sender is not the receiver, send to each client connected
                $client->send($msg);
            }
        }

    }

    protected function sendMessageToClient(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        $from->send($msg);
        
    }

    

}