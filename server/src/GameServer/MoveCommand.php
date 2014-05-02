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
		//$name = $character->getName();

		$message = array(
			'event' => 'character_moves',
			'type' => 'broadcast',
			'data' => array(
				'name' => $this->characterName,
				'color' => $character->getColor(),
				'x' => $this->x,
				'y' => $this->y,
				'msg' => vsprintf(self::RESPONSE_STRING,array($this->characterName,$this->x,$this->y)),
			)
		);

		var_dump($message);

		return $message;
	}	
}