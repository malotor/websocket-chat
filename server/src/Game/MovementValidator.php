<?php

namespace Game;

//interface validator 


class MovementValidator {
	
	private $limitX;
	private $limitY;

	public function __construct($board) {

		$this->board = $board;

		$this->limitX = $this->board->getLimitHorizontal();
		$this->limitY = $this->board->getLimitVertical();
	}

	public function validateMovement($x, $y) {
		
		if (!$this->validateCord($x)) {
			throw new InvalidCoords();
		}
		if (!$this->validateCord($y)) {
			throw new InvalidCoords();
		}
		
		if (!$this->validatePosition($x, $y)) {
			throw new CharacterOutSideBoardException();
		}

		return true;

	}

	
	protected function validateCord($cord) {
		if (is_numeric($cord)) {
			$cord += 0;
			if (gettype($cord)=='integer') {
				if ($cord >0 ) return true;
				return false;
			}
			return false;
			
		} 
		return false;
		
	}

	protected function validatePosition($x, $y) {
		
		if ((($x > $this->limitX) || ( $x < 0)) || (($y > $this->limitY) || ($y < 0))) {
			return false;
		}
		return true;	
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