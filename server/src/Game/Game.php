<?php

namespace Game;

class Game  {


	private $characters;
	private $movementManager;
	private $attackManager;

	protected $characterFactory;

  public function __construct($movementValidator, $attackManager) {
		
		$this->movementValidator = $movementValidator;
		$this->attackManager = $attackManager;

		$this->characters = new \SplObjectStorage();
	}

	public function createCharacter($characterData) {
		$character = CharacterFactory::create($characterData);
		$this->characters->attach($character, $characterData['id']);
	}

	public function countCharacters() {
		return count($this->characters);
	}

	public function getCharacter($key) {
		foreach($this->characters as $character) {
		   if ($this->characters[$character] == $key) {
		   	return $character;
		   }
		}
		return false;
	}
	
	
	function moveCharacter($characterId, $x, $y) {
		
		$character = $this->getCharacter($characterId);
		
		if (!$this->movementValidator->validateMovement($x, $y)) {
			throw new CharacterOutSideBoardException();
		}

		$character->setPosition($x, $y);
	
	}

	function getCharacters() {
		return $this->characters;
	}

	function removeCharacter($character) {
		return $this->characters->detach($character);
	}

}


class CharacterIsNotInGame extends \Exception {
   public function __construct($message = null, $code = 0, Exception $previous = null)
   {
   		$message = 'The character isn´t in the game';
      parent::__construct($message, $code, $previous);
   }
}



