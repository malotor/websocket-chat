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
        $board = new Game\Board(10,10);
        $movementValidator = new Game\MovementValidator($board);
        $this->game = new Game\Game($movementValidator);
        
        $file = "./commandMap.yml";

        $commandMapper = new CommandMapper($file);
            
        $this->CommandProcessor = new CommandProcessor();
        $this->CommandProcessor->setGame($this->game);
        $this->CommandProcessor->setCommandMapper($commandMapper);

        // create a log channel
        $this->log = new Logger('wsgame');        
        $this->log->pushHandler(new StreamHandler('./log/wsgame.log', Logger::DEBUG));




    }

    public function onOpen(ConnectionInterface $conn) {
        
        // Store the new connection to send messages to later
        $this->clients->attach($conn);
        
        $this->log->addDebug("New connection! ({$conn->resourceId})\n");
        
        $message = array(
            'event' => 'user_connected',
            'data' => array(
                'msg' => 'New user has joined the game'
            ),
        );
        
        $jsonMessage = json_encode($message);
        $this->sendMessageToAll($conn, $jsonMessage);
        
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        
        $this->log->addDebug("$msg (Connection: {$from->resourceId})\n");

        try {

            $response = $this->CommandProcessor->execCommand($msg);
            
            $type = $response['type'];
            unset($response['type']);

            $jsonMessage = json_encode($response);

            //Las respuestas se debn mandar a uno o a todos
            switch ($type) {
                case 'broadcast':
                    $this->sendMessageToAll($from, $jsonMessage);
                    break;
                
                case 'client':
                    $this->sendMessageToClient($from, $jsonMessage);
                    break;
                default:
                    $this->sendMessageToAll($from, $jsonMessage);
                    break;
            }
            

        } catch (Exception $e) {
            $this->log->addDebug('Excepción capturada: ' . $e->getMessage());
            $message = array(
            'event' => 'server_message',
                'data' => array(
                    'msg' => $e->getMessage(),
                ),
            );
            $jsonMessage = json_encode($message);
            $this->sendMessageToClient($from, $jsonMessage);
        }


    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        $this->log->addDebug("Connection {$conn->resourceId} has disconnected\n");
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        $this->log->addDebug("An error has occurred: {$e->getMessage()}\n");
        $message = array(
            'event' => 'server_message',
                'data' => array(
                    'msg' => $e->getMessage(),
                ),
            );
        $jsonMessage = json_encode($message);
        $this->sendMessageToClient($conn, $jsonMessage);
        //$conn->close();
    }


    protected function sendMessageToAll(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        $this->log->addDebug(sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's'));

        foreach ($this->clients as $client) {
            //if ($from !== $client) {
                // The sender is not the receiver, send to each client connected
                $client->send($msg);
            //}
        }

    }

    protected function sendMessageToClient(ConnectionInterface $from, $msg) {
      
        $from->send($msg);
        
    }

    

}