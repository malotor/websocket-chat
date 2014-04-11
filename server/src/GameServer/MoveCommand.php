<?php

namespace GameServer;

class MoveCommand extends Command implements iCommand  {

	
	const RESPONSE_STRING = "%s move to (%d, %d)"; 

	public function __construct ($characterName, $x, $y) {
		
		$this->characterName = $characterName;
		$this->x = $x;
		$this->y = $y;
		
	}	

	public function execute() {

		$character = $this->game->getCharacter($this->characterName);
		
		//Move the character
		$this->game->moveCharacter($character,$this->x,$this->y);

		//Prepare the message
		$name = $character->getName();

		return vsprintf(self::RESPONSE_STRING,array($name,$this->x,$this->y));
	}	
}