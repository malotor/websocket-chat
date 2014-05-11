<?php 


class MovementValidatorTestCase extends PHPUnit_Framework_TestCase {
	
	function setUp() {
	
		$board = new Game\Board(100,100);
		$this->movementValidator = new Game\MovementValidator($board);

	}

	function testValidatePosition() {
		
		$x = 32;
		$y = 45;

		$result = $this->movementValidator->validateMovement($x, $y);

		$this->assertTrue($result);	

	}
	function testValidateOtherPosition() {
		
		$x = 78;
		$y = 47;

		$result = $this->movementValidator->validateMovement($x, $y);
		
		$this->assertTrue($result);	

	}
	function testValidateOtherStringPosition() {
		
		$x = "78";
		$y = "47";

		$result = $this->movementValidator->validateMovement($x, $y);
		
		$this->assertTrue($result);	

	}

	
	/**
   * @expectedException Game\CharacterOutSideBoardException
   */

	function testValidateOutsidePosition() {
		
		$x = 178;
		$y = 247;

		$result = $this->movementValidator->validateMovement($x, $y);
		
	}


	/**
	 * @expectedException Game\InvalidCoords
	 */
	function testValidateFloatPosition() {
		
		$x = 78.2;
		$y = 47.3;

		$result = $this->movementValidator->validateMovement($x, $y);
		
	}

	
	/**
   * @expectedException Game\InvalidCoords
   */

	function testValidateOtherNegativePosition() {
		
		$x = -78;
		$y = 47;

		$result = $this->movementValidator->validateMovement($x, $y);
		
	}

	/**
   * @expectedException Game\InvalidCoords
   */

	function testValidateInvalidPosition() {
		
		$x = "posx";
		$y = "posy";

		$result = $this->movementValidator->validateMovement($x, $y);
		

	}




}