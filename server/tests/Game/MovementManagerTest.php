<?php

class MovementValidatorTest extends PHPUnit_Framework_TestCase {

	function setUp() {
		$this->aragorn = new Game\Character();
		$this->aragorn->setName("Aragorn");

		$this->frodo = new Game\Character();
		$this->frodo->setName("Frodo");

		


		$this->game = new Game\Game();

		
		$this->game->addCharacter($this->aragorn);
		$this->game->addCharacter($this->frodo);

	}

	
	function testValidateMovement() {

		$board = new Game\Board(100,100);
		$this->game->addBoard($board);

		$x = 20;
		$y = 40;

		$movementManager = new GameServer\MovementManager($this->game);

		$isValid = $movementManager->validateMovement($x, $y);

		$this->assertTrue($isValid);

	}

	function testValidateMovement() {

		$board = new Game\Board(100,100);
		$this->game->addBoard($board);

		$x = 30;
		$y = 50;

		$movementManager = new GameServer\MovementManager($this->game);

		$isValid = $movementManager->validateMovement($x, $y);

		$this->assertTrue($isValid);

	}
	
}