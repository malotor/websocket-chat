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

    const LOG_CHANEL = 'wsgame';
    const LOG_FILE = './log/wsgame.log';
    const COMMAND_MAP_FILE = './commandMap.yml';

    const DICE_SIDE = 6;
    const DICE_NUMBER = 1;

    const BOARD_VERTICAL_LENGHT = 10;
    const BOARD_HORIZONTAL_LENGHT = 10;
    
    public function __construct() {

        $this->clients = new \SplObjectStorage;

        $dice = new Game\Dice(self::DICE_SIDE, self::DICE_NUMBER);
        $attackCalculator = new Game\attackCalculator();
        $attackManager = new Game\attackManager($attackCalculator, $dice);

        //Inits Game
        $board = new Game\Board(self::BOARD_HORIZONTAL_LENGHT, self::BOARD_VERTICAL_LENGHT);
        $movementValidator = new Game\MovementValidator($board);

        $this->game = new Game\Game($movementValidator, $attackManager);
        
        $commandMapper = new CommandMapper(self::COMMAND_MAP_FILE);
            
        $this->CommandProcessor = new CommandProcessor();
        $this->CommandProcessor->setGame($this->game);
        $this->CommandProcessor->setCommandMapper($commandMapper);

        // create a log channel
        $this->logger = new Logger(self::LOG_CHANEL);        
        $this->logger->pushHandler(new StreamHandler(self::LOG_FILE, Logger::DEBUG));

    }

    protected function log($msg) {
        $this->logger->addDebug($msg . "\n");
    }

    public function onOpen(ConnectionInterface $conn) {
        
        // Store the new connection to send messages to later
        $this->clients->attach($conn);
        
        $this->log("New connection! ({$conn->resourceId})");
        
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
        
        $this->log("{$from->resourceId}: $msg");

        try {

            $this->CommandProcessor->setConnection($from);

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
            $this->log('Excepción capturada: ' . $e->getMessage());
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

        //$id = md5(uniqid(rand(), true));
        $id = $conn->resourceId;

        $character = $this->game->getCharacter($id);

        $this->game->removeCharacter($character);

        $message = array(
            'event' => 'removed_character',
            'data' => array(
                'msg' => $character->getName() + ' has been removed', 
            ),
        );
        $jsonMessage = json_encode($message);
        $this->sendMessageToClient($conn, $jsonMessage);

        $this->log("Connection {$conn->resourceId} has disconnected");
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        $this->log("An error has occurred: {$e->getMessage()}");
        $message = array(
            'event' => 'server_message',
                'data' => array(
                    'msg' => $e->getMessage(),
                ),
            );
        $jsonMessage = json_encode($message);
        $this->sendMessageToAll($conn, $jsonMessage);
    }


    protected function sendMessageToAll(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        
        $this->log(sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n" , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's'));

        foreach ($this->clients as $client) {
            $client->send($msg);
        }

    }

    protected function sendMessageToClient(ConnectionInterface $from, $msg) {
        $from->send($msg);
    }

}