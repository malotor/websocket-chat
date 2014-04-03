<?php

class GameTest extends PHPUnit_Framework_TestCase {


	function testCreateGame() {

		$board = new Game\Game();
	
	}

	function testAddNewCharacterToGame() {
		
		$characterOne = $this->getMock('Character');
		
		$newGame = new Game\Game();

		$newGame->addCharacter($characterOne);

		$this->assertTrue($newGame->hasCharacter($characterOne));

	}

	function testGetCharacterInAGame() {
		
		$key = "aragorn";
		$myCharacter = new Game\Character();
		$myCharacter->setName('Aragorn');
		$newGame = new Game\Game();
		
		$newGame->addCharacter($myCharacter,$key);

		$myFindedCharacter = $newGame->getCharacter($key);

		$this->assertEquals('Aragorn',$myFindedCharacter->getName());

	}


}
