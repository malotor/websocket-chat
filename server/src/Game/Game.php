<?php

namespace Game;

class Game  {

	private $board;
	private $characters;
	private $movementValidator;
	protected $characterFactory;

  public function __construct($movementValidator) {
		$this->movementValidator = $movementValidator;
		$this->characters = new \SplObjectStorage();
	}
	
	function setCharacterFactory($characterFactory) {
		$this->characterFactory = $characterFactory;
	}
	
	function addCharacter($character, $key=null) {
		
		$this->characters->attach($character, $key);
	}

	function hasCharacter($character) {
		
		return $this->characters->contains($character);
	}
	
	function moveCharacter($character, $x, $y) {

		if (!$this->hasCharacter($character)) {
			throw new CharacterIsNotInGame();
		} 

		if (!$this->movementValidator->validateMovement($x, $y)) {
			throw new CharacterOutSideBoardException();
		}

		$character->setPosition($x, $y);
	
	}


	function getCharacter($name) {
		foreach($this->characters as $character) {
		   if ($character->getName() == $name) {
		   	return $character;
		   }
		}
	}

	function getCharacters() {
		return $this->characters;
	}

	function getCharacterByKey($key) {
		foreach($this->characters as $character) {
		   if ($this->characters[$character] == $key) {
		   	return $character;
		   }
		}
	}

}


class CharacterOutSideBoardException extends \Exception {
   public function __construct($message = null, $code = 0, Exception $previous = null)
   {
   		$message = 'The character couldn´t be outside the board';
      parent::__construct($message, $code, $previous);
   }
}

class CharacterIsNotInGame extends \Exception {
   public function __construct($message = null, $code = 0, Exception $previous = null)
   {
   		$message = 'The character isn´t in the game';
      parent::__construct($message, $code, $previous);
   }
}



