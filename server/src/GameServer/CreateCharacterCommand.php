<?php

namespace GameServer;

class CreateCharacterCommand extends Command implements iCommand  {

	const RESPONSE_STRING = "%s has joined the game"; 

	public function __construct ($characterAttributtes) {
		$this->characterAttributtes = $characterAttributtes;
	}	

	public function execute() {

		$character = new \Game\Character();
		$character->setName($this->characterAttributtes['name']);

		//Move the character
		$this->game->addCharacter($character);
		
		return vsprintf(self::RESPONSE_STRING,array($this->characterAttributtes['name']));
	}	
}