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
	}

	function moveCharacter($character, $x, $y) {
		
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

	/* TODO: Smells we need to refactor
			1) Validate the movemento from board
			2) Move he charaacter

		Another validator class
		*/
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