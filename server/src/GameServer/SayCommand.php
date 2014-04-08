<?php

namespace GameServer;

class SayCommand implements iCommand {

	private $msg;
	private $character;

	public function __construct ($character,$msg) {
		$this->msg = $msg;
		$this->character = $character;;
	}

	public function execute() {
		
		$characterName = $this->character->getName();

		return $characterName . " says: " . $this->msg;

	}	
}