<?php 


class MovementManagerTestCase extends PHPUnit_Framework_TestCase {
	
	function setUp() {

		$this->aragorn = new Game\Character();
		$this->aragorn->setName('Aragorn');

		$this->legolas = new Game\Character();
		$this->legolas->setName('legolas');

		$middleEarth = new Game\Board(10,10);
		$movementValidator = new Game\MovementValidator($middleEarth);

		$this->movementValidator = $this->getMockBuilder('Game\MovementValidator')
    		->setMethods(array('validateMovement'))
        ->disableOriginalConstructor()
        ->getMock();

		
		$this->movementManager = new Game\MovementManager($this->movementValidator);


	}

	function testMoveACaracterToOnPosition() {
		
		$this->movementValidator->expects($this->once())
		->method('validateMovement')
		->with(2,3)
		->will($this->returnValue(true));

		$this->movementManager->moveCharacter($this->legolas,2,3);
		
		$this->assertEquals($this->legolas->getPositionX(), 2);	
		$this->assertEquals($this->legolas->getPositionY(), 3);	

	}
	
}