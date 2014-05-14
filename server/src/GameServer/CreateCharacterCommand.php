<?php

namespace GameServer;


function rand_color() {
    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}

class CreateCharacterCommand extends Command implements iCommand  {

	const RESPONSE_STRING = "%s has been created and added to the game"; 

	public function __construct ($characterData) {
		$this->characterData = $characterData;
	}	

	public function execute() {

    //$id = md5(uniqid(rand(), true));
    $id = $this->connection->resourceId;
    //Generates inital random position iside board
		//TODO get limits fron board
		$x = rand(1,10);
		$y = rand(1,10);

		$this->characterData['id'] = $id;
		$this->characterData['color'] = rand_color();
		$this->characterData['x'] = $x;
		$this->characterData['y'] = $y;
		$this->characterData['lifePoints'] = rand(1, 20);
		$this->characterData['defensePoints'] = rand(1, 10);;
		$this->characterData['attackPoints'] = rand(1, 10);;


		$this->game->createCharacter($this->characterData, $id);

		$message = array(
			'event' => 'character_created',
			'type' => 'broadcast',
			'data' => array(
				'name' => $this->characterData['name'],
				'x' => $this->characterData['x'],
				'y' => $this->characterData['y'],
				'id' => $this->characterData['id'],
				'color' => $this->characterData['color'],
			)
		);

		return $message;
	}	
}