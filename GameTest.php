<?php

require './vendor/autoload.php';


require 'vendor/simpletest/simpletest/autorun.php';

class CharacterTestCase extends UnitTestCase {
	
	
	private $goodCharacter;
	private $badCharacter;

	function setUp() {
		$this->goodCharacter = new Game\Character();
		$this->goodCharacter->setName("Aragorn");
	}

	function testCharacterHaveName() {
		
		$userName = $this->goodCharacter->getName();

		$this->assertEqual($userName, 'Aragorn');		
	}

	function testDiferentCharactersHaveDiferentsNames() {
		$anothterGoogCharacte = new Game\Character();
		$anothterGoogCharacte->setName("Frodo");
		$anothterGoogCharacteName = $anothterGoogCharacte->getName();

		$this->assertEqual($anothterGoogCharacteName, 'Frodo');	
	}


	function testPointCharacterInOnePoint() {
		
		$this->goodCharacter->setPosition(10,20);

		$charactePositionChordsX = $this->goodCharacter->getPositionX();
		$charactePositionChordsY = $this->goodCharacter->getPositionY();

		$this->assertEqual($charactePositionChordsX, 10);	
		$this->assertEqual($charactePositionChordsY , 20);	

	}

	function testChangeCharacterPosition() {
		
		$this->goodCharacter->setName("Frodo");
		$this->goodCharacter->setPosition(32,45);
		
		$charactePositionChordsX = $this->goodCharacter->getPositionX();
		$charactePositionChordsY = $this->goodCharacter->getPositionY();
		
		$this->assertEqual($charactePositionChordsX, 32);	
		$this->assertEqual($charactePositionChordsY , 45);	

	}

	function testMoveCharacteToUp() {

		$this->goodCharacter->setPosition(32,45);
		$this->goodCharacter->moveUp(10);

		$charactePositionChordsY = $this->goodCharacter->getPositionY();

		$this->assertEqual($charactePositionChordsY, 55);	

	}
	

	function testMoveCharacteToDown() {
		$this->goodCharacter->setPosition(32,45);
		$this->goodCharacter->moveDown(10);

		$charactePositionChordsY = $this->goodCharacter->getPositionY();

		$this->assertEqual($charactePositionChordsY, 35);	
	}

	function testMoveCharacterToLeft() {
		$this->goodCharacter->setPosition(32,45);
		$this->goodCharacter->moveleft(10);

		$charactePositionChordsX = $this->goodCharacter->getPositionX();

		$this->assertEqual($charactePositionChordsX, 22);	

	}

	function testMoveCharacterToRigh() {

		$this->goodCharacter->setPosition(32,45);
		$this->goodCharacter->moveRight(10);

		$charactePositionChordsX = $this->goodCharacter->getPositionX();

		$this->assertEqual($charactePositionChordsX, 42);	
	}

}


class BoardTestCase extends UnitTestCase {

	function testCreateBoard() {
		
		$board = new Game\Board(100,200);

		$limitX = $board->getLimitHorizontal();
		
		$limitY = $board->getLimitVertical();

		$this->assertEqual($limitX, 100);		
		$this->assertEqual($limitY, 200);

	}

}


class MovementManagerTestCase extends UnitTestCase {

	function testMoveAItem() {
		/*
		$MovementManager = new Game\MovementMananer();
		
		$middleEarth = new Game\Board(100,200);

		$myHobbit = new Game\Character();
		$myHobbit->setName("Frodo");

		$MovementManager->setBoard($middleEarth);
		

		$MovementManager->addItem($myHobbit,20,50);



		$limitX = $board->getLimitHorizontal();
		
		$limitY = $board->getLimitVertical();

		$this->assertEqual($limitX, 100);		
		$this->assertEqual($limitY, 200);
		*/
	}

}