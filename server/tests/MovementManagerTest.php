<?php

class MovementManagerTestCase extends PHPUnit_Framework_TestCase {

	private $middleEarth;
	private $myHobbit;


	function setUp() {
		$this->middleEarth = new Game\Board(100,200);

		$this->myHobbit = new Game\Character();
		$this->myHobbit->setName("Frodo");
	}
	function testMoveAItem() {
		
		$MovementManager = new Game\MovementManager($this->middleEarth);

		$result = $MovementManager->moveItem($this->myHobbit,20,50);

		$charactePositionChordsX = $this->myHobbit->getPositionX();
		$charactePositionChordsY = $this->myHobbit->getPositionY();

		$this->assertEquals($charactePositionChordsX, 20);	
		$this->assertEquals($charactePositionChordsY , 50);	
		
	}

	 /**
   * @expectedException Game\CharacterOutSideBoardException
   */

	function testMoveAItemOutSideBoard() {
		
		$MovementManager = new Game\MovementManager($this->middleEarth);

		$MovementManager->moveItem($this->myHobbit,120,50);

		$charactePositionChordsX = $this->myHobbit->getPositionX();
		$charactePositionChordsY = $this->myHobbit->getPositionY();

		//$this->assertEquals($charactePositionChordsX, 0);	
		//$this->assertEquals($charactePositionChordsY , 0);	
		
	}

	/**
   * @expectedException Game\CharacterOutSideBoardException
   */

	function testMoveAItemOutSideAnotherBoard() {
		
		$neverland = new Game\Board(30,40);

		$MovementManager = new Game\MovementManager($neverland);

		$MovementManager->moveItem($this->myHobbit,30,45);
		
	}
	
	/**
   * @expectedException Game\CharacterOutSideBoardException
  */

	function testMoveAItemInAnotherBoard() {
		
		$neverland = new Game\Board(30,40);

		$MovementManager = new Game\MovementManager($neverland);

		$MovementManager->moveItem($this->myHobbit,-10,-3);
		
	}


}