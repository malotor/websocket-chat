<?php

namespace Game;

class MovementValidator {
	
	public function __construct($board) {

		$this->board = $board;
	}

	public function validateMovement($x,$y) {
		
		if (!$this->validateCord($x)) {
			throw new InvalidCoords();
		}
		if (!$this->validateCord($y)) {
			throw new InvalidCoords();
		}

		if (!$this->hasCharacter($character)) {
			throw new CharacterIsNotInGame();
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



class InvalidCoords extends \Exception {
   public function __construct($message = null, $code = 0, Exception $previous = null)
   {
   		$message = 'The coords are invalid';
      parent::__construct($message, $code, $previous);
   }
}