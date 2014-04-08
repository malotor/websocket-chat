<?php

class BoardTest extends PHPUnit_Framework_TestCase {

	function testCreateBoard() {
		
		$board = new Game\Board(100,200);

		$limitX = $board->getLimitHorizontal();
		
		$limitY = $board->getLimitVertical();

		$this->assertEquals($limitX, 100);		
		$this->assertEquals($limitY, 200);

	}

}
