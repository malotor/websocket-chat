<?php

namespace Game;

class CharacterFactory
{
    public static function create($characterData)
    {
    	
    	$character = new \Game\Character();
			
			$character->setName($characterData['name']);
			$character->setColor($characterData['color']);
			$character->setPosition($characterData['x'], $characterData['y']);

			$character->setLifePoints($characterData['lifePoints']);
			$character->setDefensePoints($characterData['defensePoints']);
			$character->setAttackPoints($characterData['attackPoints']);
			
			return $character;
    
    }

}
