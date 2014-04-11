<?php

namespace GameServer;

class CommandProcessor  {

	public function __construct($game) {
		$this->game = $game;
	}
	
	public function execCommand($msg) {
		
    $jsonMsg = json_decode($msg,true);


    $commandName = $jsonMsg['command'];
    $args = $jsonMsg['args'];
    
		$commandMapper = new CommandMapper();

		$commandMap = $commandMapper->getMap();

		
		try {
			$commandClassName = $commandMap[$commandName];
		} catch (\Exception $e) {
			throw new CommandNotExistsException();
		}
		
		$ref = new \ReflectionClass($commandClassName);
		$commandClass = $ref->newInstanceArgs($args);
    $commandClass->setGame($this->game);
		return $commandClass->execute();
		
	}
	
}



class CommandNotExistsException extends \Exception {
   public function __construct($message = null, $code = 0, Exception $previous = null)
   {
   		$message = 'The command doesn´t exists';

   		parent::__construct($message, $code, $previous);
   }
}
