<?php

namespace Game;


class MovementManager {
	
	protected $movementValidator;

	public function __construct($movementValidator) {
		$this->movementValidator = $movementValidator;
	}

	public function moveCharacter($character, $x, $y) {
		
		$this->movementValidator->validateMovement($x, $y);

		$character->setPosition($x, $y);
	}


}