<?php

namespace Game;

class Game  {

	private $board;
	private $characters;
	private $movementValidator;

	public function __construct() {
		$this->characters = new \SplObjectStorage();
	}

	function addCharacter($character) {
		
		$this->characters->attach($character);
	}

	function hasCharacter($character) {
		
		return $this->characters->contains($character);
	}

	function addBoard($board) {
		$this->board = $board;
		
	}

	function addMovementValidator($movementValidator) {
		$this->movementValidator = $movementValidator;
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



