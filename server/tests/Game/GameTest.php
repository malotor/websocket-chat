<?php



class GameTest extends PHPUnit_Framework_TestCase {

	function setUp() {
		
		$this->aragorn = new Game\Character();
		$this->aragorn->setName('Aragorn');

		$this->legolas = new Game\Character();
		$this->legolas->setName('legolas');

		$middleEarth = new Game\Board(100,200);

		$this->helmsDeep = new Game\Game();

		$this->helmsDeep->addBoard($middleEarth);
		
		$movementValidator = new Game\MovementValidator(100, 200);
		$this->helmsDeep->addMovementValidator($movementValidator);

	}
	
	function testAddNewCharacterToGame() {
		
		$this->helmsDeep->addCharacter($this->aragorn);

		$this->assertTrue($this->helmsDeep->hasCharacter($this->aragorn));


	}

	function testAddAnotherCharacterToGame() {
		
		$this->helmsDeep->addCharacter($this->legolas);

		$this->assertTrue($this->helmsDeep->hasCharacter($this->legolas));

	}

	function testAddSeveralCharacterToGame() {
		
		$this->helmsDeep->addCharacter($this->legolas);
		$this->helmsDeep->addCharacter($this->aragorn);

		$this->assertTrue($this->helmsDeep->hasCharacter($this->legolas));
		$this->assertTrue($this->helmsDeep->hasCharacter($this->aragorn));

	}

	function testAddAnotherIsNotInGame() {
		
		$boromir = new Game\Character();
		
		$this->assertFalse($this->helmsDeep->hasCharacter($boromir));

	}

	function testMoveACaracterToOnPosition() {
		
		$this->helmsDeep->addCharacter($this->legolas);

		$this->helmsDeep->moveCharacter($this->legolas,20,30);
		
		$this->assertEquals($this->legolas->getPositionX(), 20);	
		$this->assertEquals($this->legolas->getPositionY(), 30);	

	}
	function testMoveACaracterToAnotherPosition() {
		
		$this->helmsDeep->addCharacter($this->legolas);

		$this->helmsDeep->moveCharacter($this->legolas,45,78);
		
		$this->assertEquals($this->legolas->getPositionX(), 45);	
		$this->assertEquals($this->legolas->getPositionY(), 78);	

	}

	/**
	 * @expectedException Game\CharacterOutSideBoardException
	 */
	
	function testMoveACaracterOutsideTheBoard() {
		
		$this->helmsDeep->addCharacter($this->legolas);

		$this->helmsDeep->moveCharacter($this->legolas,150,22230);
	
	}
	
	/**
   * @expectedException Game\CharacterOutSideBoardException
   */
	
	function testAfterInvalidMovementCharacterAreInTheSamePlace() {
		
		$this->helmsDeep->addCharacter($this->legolas);

		$originalPositionX = $this->legolas->getPositionX();
		$originalPositionY = $this->legolas->getPositionY();

		$this->helmsDeep->moveCharacter($this->legolas,-20,30);
		
		$this->assertEquals($this->legolas->getPositionX(), $originalPositionX);	
		$this->assertEquals($this->legolas->getPositionY() , $originalPositionY);
	}


	
	/**
   * @expectedException Game\CharacterIsNotInGame
   */
	
	function testCantMoveCharacterThatIsNotInTheGame() {
		
		$myElf = new Game\Character();
		$myElf->setName('Legolas');

		$this->helmsDeep->moveCharacter($myElf,20,30);
	
	}


	function testRetrieveACharacterByHisName() {
		
		$myElf = new Game\Character();
		$myElf->setName('Legolas');

		$this->helmsDeep->addCharacter($myElf);

		$legolas = $this->helmsDeep->getCharacter('Legolas');

		$this->assertEquals($legolas->getName(),'Legolas');

	}
	function testCantRetrieveACharactarThatNoExists() {
		

		$legolas = $this->helmsDeep->getCharacter('Gimly');

		$this->assertNull($legolas);
	
	}


	/**
	 * @expectedException Game\InvalidCoords
	 */
	
	function testMoveACaracterToInvalidTextCoords() {
		
		$this->helmsDeep->addCharacter($this->legolas);

		$this->helmsDeep->moveCharacter($this->legolas,'x','y');
	
	}

	
	function testMoveACaracterToInvalidNumCoords() {
		
		$this->helmsDeep->addCharacter($this->legolas);

		$this->helmsDeep->moveCharacter($this->legolas,'22','33');

		$this->assertEquals($this->legolas->getPositionX(), 22);	
		$this->assertEquals($this->legolas->getPositionY(), 33);	
	
	}

	/**
	 * @expectedException Game\InvalidCoords
	 */

	function testMoveACaracterToInvalidNumStringCoords() {
		
		$this->helmsDeep->addCharacter($this->legolas);

		$this->helmsDeep->moveCharacter($this->legolas,'22.3','33.3');

	}

	/**
	 * @expectedException Game\InvalidCoords
	 */
	
	function testMoveACaracterToInvalidFloatCoords() {
		
		$this->helmsDeep->addCharacter($this->legolas);

		$this->helmsDeep->moveCharacter($this->legolas,23.3,23.2);
	
	}

}
