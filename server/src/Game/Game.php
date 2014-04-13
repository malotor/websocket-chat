<?php

namespace Game;

class Game  {

	private $board;
	private $characters;
	
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
		$this->MovementValidator = new MovementValidator($this->board);
	}

	function moveCharacter($character, $x, $y) {

		if (!$this->validateCord($x)) {
			throw new InvalidCoords();
		}
		if (!$this->validateCord($y)) {
			throw new InvalidCoords();
		}

		if (!$this->hasCharacter($character)) {
			throw new CharacterIsNotInGame();
		} 
		$this->validatePosition($x,$y);
		$character->setPosition($x, $y);
	
	}


	function getCharacter($name) {
		foreach($this->characters as $character) {
		   if ($character->getName() == $name) {
		   	return $character;
		   }
		}
	}


	protected function validateCord($cord) {
		if (is_numeric($cord)) {
			$cord += 0;
			if (gettype($cord)=='integer') {
				return true;
			}
			else {
				return false;
			}
		} else {
			return false;
		}
	}


	protected function validatePosition($x,$y) {
		$limitX = $this->board->getLimitHorizontal();
		$limitY = $this->board->getLimitVertical();

		if ((($x > $limitX) || ( $x < 0)) || (($y > $limitY) || ($y < 0))) 
			throw new CharacterOutSideBoardException();
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