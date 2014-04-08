<?php

namespace GameServer;


class MoveCommand implements iCommand  {
	public function __construct ($game, $character, $x, $y) {
		
		$this->character = $character;
		$this->game = $game;
		$this->x = $x;
		$this->y = $y;
	}	

	public function execute() {

		//$character = $this->game->getCharacter($this->characterName);

		//Move the character
		$this->game->moveCharacter($this->character,$this->x,$this->y);

		//Prepare the message
		$name = $this->character->getName();

		return "{$name} move to ({$this->x}, {$this->y})";
	}	
}