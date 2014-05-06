<?php 


class MovementValidatorTestCase extends PHPUnit_Framework_TestCase {
	
	function setUp() {
	
		$board = new Game\Board(100,100);
		$this->movementValidator = new Game\MovementValidator($board);

	}
}