<?php


class CharacterTest extends PHPUnit_Framework_TestCase {
	
	
	private $goodCharacter;
	private $badCharacter;

	function setUp() {
		$this->goodCharacter = new Game\Character();
		$this->goodCharacter->setName("Aragorn");

	}

	function testCharacterHaveName() {
		
		$userName = $this->goodCharacter->getName();

		$this->assertEquals($userName, 'Aragorn');		
	}

	function testDiferentCharactersHaveDiferentsNames() {
		$anothterGoogCharacte = new Game\Character();
		$anothterGoogCharacte->setName("Frodo");
		$anothterGoogCharacteName = $anothterGoogCharacte->getName();

		$this->assertEquals($anothterGoogCharacteName, 'Frodo');	
	}


	function testPointCharacterInOnePoint() {
		
		$this->goodCharacter->setPosition(10,20);

		$charactePositionChordsX = $this->goodCharacter->getPositionX();
		$charactePositionChordsY = $this->goodCharacter->getPositionY();

		$this->assertEquals($charactePositionChordsX, 10);	
		$this->assertEquals($charactePositionChordsY , 20);	

	}

	function testPointCharacterStartPosition() {
		
		$charactePositionChordsX = $this->goodCharacter->getPositionX();
		$charactePositionChordsY = $this->goodCharacter->getPositionY();

		$this->assertEquals($charactePositionChordsX, 0);	
		$this->assertEquals($charactePositionChordsY , 0);	

	}

	function testChangeCharacterPosition() {
		
		$this->goodCharacter->setName("Frodo");
		$this->goodCharacter->setPosition(32,45);
		
		$charactePositionChordsX = $this->goodCharacter->getPositionX();
		$charactePositionChordsY = $this->goodCharacter->getPositionY();
		
		$this->assertEquals($charactePositionChordsX, 32);	
		$this->assertEquals($charactePositionChordsY , 45);	

	}

	function testMoveCharacteToUp() {

		$this->goodCharacter->setPosition(32,45);
		$this->goodCharacter->moveUp(10);

		$charactePositionChordsY = $this->goodCharacter->getPositionY();

		$this->assertEquals($charactePositionChordsY, 55);	

	}
	

	function testMoveCharacteToDown() {
		$this->goodCharacter->setPosition(32,45);
		$this->goodCharacter->moveDown(10);

		$charactePositionChordsY = $this->goodCharacter->getPositionY();

		$this->assertEquals($charactePositionChordsY, 35);	
	}

	function testMoveCharacterToLeft() {
		$this->goodCharacter->setPosition(32,45);
		$this->goodCharacter->moveleft(10);

		$charactePositionChordsX = $this->goodCharacter->getPositionX();

		$this->assertEquals($charactePositionChordsX, 22);	

	}

	function testMoveCharacterToRigh() {

		$this->goodCharacter->setPosition(32,45);
		$this->goodCharacter->moveRight(10);

		$charactePositionChordsX = $this->goodCharacter->getPositionX();

		$this->assertEquals($charactePositionChordsX, 42);	
	}


	/**
	 * @expectedException Game\CharacterDontHaveName
	 */
	function testCharactarMustHaveANane() {

			$badOrc = new Game\Character();
			$badOrcName = $badOrc->getName();

	}

	function testCharacterReciveWound() {

		
		$this->goodCharacter->setLifePoints(20);

		$this->goodCharacter->receiveDamage(5);

		$lifePoints = $this->goodCharacter->getLifePoints();

		$this->assertEquals($lifePoints , 15);	
	}
	function testCharacterReciveWoundSeveralTimes() {

		
		$this->goodCharacter->setLifePoints(20);

		$this->goodCharacter->receiveDamage(5);
		$this->goodCharacter->receiveDamage(10);
		$lifePoints = $this->goodCharacter->getLifePoints();

		$this->assertEquals($lifePoints , 5);	

		
	}

}