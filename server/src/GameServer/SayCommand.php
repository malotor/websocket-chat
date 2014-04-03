<?php

namespace GameServer;

class SayCommand implements iCommand {

	private $character;
	private $sentence;
	
	public function __construct () {
		$args = func_get_args();
		$this->character = $args[0];
		$this->sentence = $args[1];
	}

	public function execute() {

		$characterName = $this->character->getName();

		return $characterName . " says: " . $this->sentence;

	}	
}