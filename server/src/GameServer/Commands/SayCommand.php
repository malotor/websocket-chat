<?php

namespace GameServer\Commands;

class SayCommand extends Command implements iCommand {

	private $msg;
	private $character;

	const RESPONSE_STRING = "%s says: %s"; 

	public function __construct ($msg) {
		$this->msg = $msg;
	}

	public function execute() {
		
		$id = $this->connection->resourceId;
		$character = $this->game->getCharacter($id);

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