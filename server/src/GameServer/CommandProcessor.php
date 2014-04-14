<?php

namespace GameServer;

class CommandProcessor  {



	public function __construct($game) {
		$this->game = $game;
	}
	
	public function execCommand($msg) {
		
		$file = "./commandMap.yml";

    $jsonMsg = json_decode($msg,true);


    $commandName = $jsonMsg['command'];
    $args = $jsonMsg['args'];
    
		
		$commandMapper = new CommandMapper($file);
		
		$commandClassName = $commandMapper->getClass($commandName);
		
		
		$ref = new \ReflectionClass($commandClassName);
		$commandClass = $ref->newInstanceArgs($args);
    $commandClass->setGame($this->game);
		return $commandClass->execute();
		
	}
	
}




