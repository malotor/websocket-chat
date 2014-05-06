<?php

class CharacterFactory
{
    public static function create($characterData)
    {
    	
    	$character = new \Game\Character();
			
			$character->setName($characterData['name']);
			$character->setColor($characterData['color']);
			$character->setPosition($characterData['x'], $characterData['y']);

			return $character;
    
    }
}
