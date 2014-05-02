<?php

namespace GameServer;

class GetCharactersCommand extends Command implements iCommand  {

	
	public function __construct () {
		
	}	

	public function execute() {

		$characterList = array();

		foreach ( $this->game->getCharacters() as $key => $character) { 
    	
    	$charData['name'] = $character->getName();
    	$charData['color'] = $character->getColor();
    	$charData['posx'] = $character->getPositionX();
    	$charData['posy'] = $character->getPositionY();
    
    	$characterList[] = $charData;	
    }

    var_dump($characterList);

		$message = array(
			'event' => 'characters_list',
			'type' => 'client',
			'data' => array(
				'characters' => $characterList,
			)
		);
		
		//return vsprintf(self::RESPONSE_STRING,array($this->characterAttributtes['name']));
		return $message;
	}	
}