<?php

namespace Game;

class MovementManager {
	
	public function __construct($board) {

		$this->board = $board;
	}

	protected function validateMovement($x,$y) {

		$limitX = $this->board->getLimitHorizontal();
		$limitY = $this->board->getLimitVertical();

		if ((($x > $limitX) || ( $x < 0)) || (($y > $limitY) || ($y < 0))) 
			throw new CharacterOutSideBoardException('The character couldn´t be outside the board');
	}

	function moveItem($character,$x,$y) {

		$this->validateMovement($x,$y);

		$character->setPosition($x, $y);

	}	
	
}


 // Test_Exception.php
class CharacterOutSideBoardException extends \Exception {
   public function __construct($message = null, $code = 0, Exception $previous = null)
   {
       parent::__construct($message, $code, $previous);
   }
}