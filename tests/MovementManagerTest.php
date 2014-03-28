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
		
		$MovementManager = new Game\MovementManager($this->middleEarth,$this->myHobbit);

		$result = $MovementManager->moveItem(20,50);

		$charactePositionChordsX = $this->myHobbit->getPositionX();
		$charactePositionChordsY = $this->myHobbit->getPositionY();

		$this->assertEquals($charactePositionChordsX, 20);	
		$this->assertEquals($charactePositionChordsY , 50);	
		
	}

	function testMoveAItemOutSideBoard() {
		
		$MovementManager = new Game\MovementManager($this->middleEarth,$this->myHobbit);

		$MovementManager->moveItem(120,50);

		$charactePositionChordsX = $this->myHobbit->getPositionX();
		$charactePositionChordsY = $this->myHobbit->getPositionY();

		$this->assertEquals($charactePositionChordsX, 0);	
		$this->assertEquals($charactePositionChordsY , 0);	
		
	}

}