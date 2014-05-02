<?php

namespace GameServer;

class CommandProcessor  {

	protected $game;

	protected $commandMapper;

	protected $connectionId;


	public function __construct() {

	}

	public function setGame($game) {
		$this->game = $game;
	}

	public function setCommandMapper($commandMapper) {
		$this->commandMapper = $commandMapper;
	}

	
	public function execCommand($msg) {
	
    $jsonMsg = json_decode($msg,true);

    $commandName = $jsonMsg['event'];
    $args = $jsonMsg['data'];
    
		$commandClassName = $this->commandMapper->getClass($commandName);
		$ref = new \ReflectionClass($commandClassName);
		$commandClass = $ref->newInstanceArgs($args);
    $commandClass->setGame($this->game);
		
		return $commandClass->execute();
		
	}
	
}




