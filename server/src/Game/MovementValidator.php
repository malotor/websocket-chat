<?php

namespace Game;

//interface validator 


class MovementValidator {
	
	private $limitX;
	private $limitY;

	public function __construct($limitX, $limitY) {

		$this->limitX = $limitX;
		$this->limitY = $limitY;
	}

	public function validateMovement($x, $y) {
		
		if (!$this->validateCord($x)) {
			throw new InvalidCoords();
		}
		if (!$this->validateCord($y)) {
			throw new InvalidCoords();
		}
		
		return $this->validatePosition($x, $y);

	}

	
	protected function validateCord($cord) {
		if (is_numeric($cord)) {
			$cord += 0;
			if (gettype($cord)=='integer') {
				return true;
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


class InvalidCoords extends \Exception {
   public function __construct($message = null, $code = 0, Exception $previous = null)
   {
   		$message = 'The coords are invalid';
      parent::__construct($message, $code, $previous);
   }
}