<?php

namespace GameServer;

class SayCommand extends Command implements iCommand {

	private $msg;
	private $character;

	const RESPONSE_STRING = "%s says: %s"; 

	public function __construct ($characterId, $msg) {
		$this->msg = $msg;
		$this->characterId = $characterId;
	}

	public function execute() {
		
		$character = $this->game->getCharacter($this->characterId);

		$message = array(
			'event' => 'character_says',
			'type' => 'broadcast',
			'data' => array(
				'user' => $character->getName(),
				'msg' => $this->msg,
				'color' => $character->getColor(),
			)
		);
		
		return $message;
	
	}	
}