<?php

namespace Game;

//interface validator 
function numberIsPositiveInteger($x) {
	$x += 0;
	if ((gettype($x)=='integer') && ($x > 0 )) return true;
	return false;
}

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
		
		if (!is_numeric($cord)) return false;

		if (!numberIsPositiveInteger($cord)) return false;

		return true;
		
	}
	
	protected function validatePosition($x, $y) {
		return  (($x < $this->limitX ) && ( $y < $this->limitY ));
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