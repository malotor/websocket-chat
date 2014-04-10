<?php

namespace GameServer;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Game;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


class Server implements MessageComponentInterface {
    protected $clients;

    private $game;
    private $board;

    public function __construct() {

        $this->clients = new \SplObjectStorage;

        //Inits Game
        $board = new Game\Board(100,100);
        $this->game = new Game\Game();
        $this->game->addBoard($board);

        // create a log channel
        $this->log = new Logger('wsgame');
        
        $this->log->pushHandler(new StreamHandler('./log/wsgame.log', Logger::DEBUG));

        /*
        $log->addDebug('Esto es un mensaje de DEBUG');
        $log->addInfo('Esto es un mensaje de INFO');
        $log->addWarning('Esto es un mensaje de WARNING');
        $log->addError('Esto es un mensaje de ERROR');
        $log->addCritical('Esto es un mensaje de CRITICAL');
        $log->addAlert('Esto es un mensaje de ALERT');
        */
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);
    
        
        $this->log->addDebug("New connection! ({$conn->resourceId})\n");

    }

    public function onMessage(ConnectionInterface $from, $msg) {
        
        try {
            $CommandProcessor = new CommandProcessor($this->game);
            $response = $CommandProcessor->execCommand($msg);
            $this->sendMessageToAll($from, $response);
        } catch (Exception $e) {
            $this->log->addDebug('Excepción capturada: ' . $e->getMessage());

            $this->sendMessageToClient($from, $msg);
        }


    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        $this->log->addDebug("Connection {$conn->resourceId} has disconnected\n");
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        $this->log->addDebug("An error has occurred: {$e->getMessage()}\n");
        $this->sendMessageToClient($conn, $e->getMessage());
        //$conn->close();
    }


    protected function sendMessageToAll(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        $this->log->addDebug(sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's'));

        foreach ($this->clients as $client) {
            if ($from !== $client) {
                // The sender is not the receiver, send to each client connected
                $client->send($msg);
            }
        }

    }

    protected function sendMessageToClient(ConnectionInterface $from, $msg) {
      
        $from->send($msg);
        
    }

    

}