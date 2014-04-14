<?php 


class MovementValidatorTestCase extends PHPUnit_Framework_TestCase {
	
	function setUp() {
	
		$this->movementValidator = new Game\MovementValidator(100, 100);

	}

	function testValidatePosition() {
		
		$x = 32;
		$y = 45;

		$result = $this->movementValidator->validateMovement($x, $y);
		//var_dump($result);

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

	function testValidateNegativePosition() {
		
		$x = -78;
		$y = 47;

		$result = $this->movementValidator->validateMovement($x, $y);
		
		$this->assertFalse($result);	

	}

	function testValidateOutsidePosition() {
		
		$x = 178;
		$y = 247;

		$result = $this->movementValidator->validateMovement($x, $y);
		
		$this->assertFalse($result);	

	}


	function testValidateOtherNegativePosition() {
		
		$x = -78;
		$y = 47;

		$result = $this->movementValidator->validateMovement($x, $y);
		
		$this->assertFalse($result);	

	}

	/**
   * @expectedException Game\InvalidCoords
   */

	function testValidateInvalidPosition() {
		
		$x = "posx";
		$y = "posy";

		$result = $this->movementValidator->validateMovement($x, $y);
		
		$this->assertTrue($result);	

	}

}