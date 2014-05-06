<?php

namespace GameServer;

function rand_color() {
    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
}

class CreateCharacterCommand extends Command implements iCommand  {

	const RESPONSE_STRING = "%s has been created and added to the game"; 

	public function __construct ($characterAttributtes) {
		$this->characterAttributtes = $characterAttributtes;
	}	

	public function execute() {

		$userColor = rand_color();
		$enter = true;
    while($enter) {
    	$enter = false;

      foreach ( $this->game->getCharacters() as $character) { 
          if ( $userColor == $character->getColor() )  {
             	$enter = true;
             	$userColor = rand_color();
              break;
          }
      }

    }
    
    $key = md5(uniqid(rand(), true));

		$character = new \Game\Character();
		$character->setName($this->characterAttributtes['name']);
		$character->setColor($userColor);

		//Generates inital random position iside board
		//TODO get limits fron board
		$x = rand(1,10);
		$y = rand(1,10);

		$character->setPosition($x, $y);

		//Adds character to game
		$this->game->addCharacter($character, $key);

		$message = array(
			'event' => 'user_created',
			'type' => 'broadcast',
			'data' => array(
				'name' => $this->characterAttributtes['name'],
				'posx' => $x,
				'posy' => $y,
				'key' => $key,
				'color' => $userColor,
 				'msg' => vsprintf(self::RESPONSE_STRING,array($this->characterAttributtes['name'])),
			)
		);

		return $message;
	}	
}