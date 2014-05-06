<?php

namespace GameServer;

class CreateCharacterCommand extends Command implements iCommand  {

	const RESPONSE_STRING = "%s has been created and added to the game"; 

	public function __construct ($characterData) {
		$this->characterData = $characterData;
	}	

	public function execute() {

		$character = new \Game\Character();
		$character->setName($this->characterData['name']);
		$character->setColor($this->characterData['color']);
		$character->setPosition($this->characterData['x'], $this->characterData['y']);
		
	

		$this->game->addCharacter($character, $this->characterData['key']);

		$message = array(
			'event' => 'character_created',
			'type' => 'broadcast',
			'data' => array(
				'name' => $this->characterData['name'],
				'x' => $this->characterData['x'],
				'y' => $this->characterData['y'],
				'key' => $this->characterData['key'],
				'color' => $this->characterData['color'],
			)
		);

		return $message;
	}	
}