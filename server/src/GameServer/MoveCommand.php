<?php

namespace GameServer;

class MoveCommand extends Command implements iCommand  {

	
	const RESPONSE_STRING = "%s move to (%d, %d)"; 

	public function __construct ($x, $y) {
		
		$this->x = $x;
		$this->y = $y;
		
	}	

	public function execute() {

		//Move the character
		$id = $this->connection->resourceId;
		$character = $this->game->getCharacter($id);
		
		$this->game->moveCharacter($id ,$this->x,$this->y);

		$message = array(
			'event' => 'character_moves',
			'type' => 'broadcast',
			'data' => array(
				'name' => $character->getName(),
				'color' => $character->getColor(),
				'x' => $this->x,
				'y' => $this->y,
				'msg' => vsprintf(self::RESPONSE_STRING,array($character->getName(),$this->x,$this->y)),
			)
		);

		return $message;
	}	
}