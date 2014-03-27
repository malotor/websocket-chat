<?php

namespace GameServer;

class MoveCommand implements iCommand {

	private $character;
	private $x;
	private $y;
	
	public function __construct ($character, $x, $y) {
		$args = func_get_args();

		$this->character = $args[0];
		$this->x = $args[1];
		$this->y = $args[2];
	}

	public function execute() {

		$this->character->setPosition($this->x,$this->y);
	}	
}