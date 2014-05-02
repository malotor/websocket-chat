<?php

namespace GameServer;

class SayCommand extends Command implements iCommand {

	private $msg;
	private $character;

	const RESPONSE_STRING = "%s says: %s"; 

	public function __construct ($characterName, $msg) {
		$this->msg = $msg;
		$this->characterName = $characterName;
	}

	public function execute() {
		
		$character = $this->game->getCharacter($this->characterName);

		$message = array(
			'event' => 'character_says',
			'type' => 'broadcast',
			'data' => array(
				'user' => $this->characterName,
				'msg' => $this->msg,
				'color' => $character->getColor(),
			)
		);
		//return vsprintf(self::RESPONSE_STRING,array($this->characterName, $this->msg));
		return $message;
	}	
}