<?php


class SayCommandTest extends PHPUnit_Framework_TestCase {
	
	function setUp() {
		$this->goodCharacter = new Game\Character();
		$this->goodCharacter->setName("Aragorn");

		$this->anothterGoogCharacte = new Game\Character();
		$this->anothterGoogCharacte->setName("Frodo");
	}

	function testACharacterSayHello() {
		
		$string = "Hello";
		$command = new GameServer\SayCommand($this->goodCharacter,$string);

		$response = $command->execute();

		$this->assertEquals($response, 'Aragorn says: Hello');	

	}

	function testAnotherCharacterSayHello() {
		
		$string = "Hello";
		$command = new GameServer\SayCommand($this->anothterGoogCharacte,$string);

		$response = $command->execute();

		$this->assertEquals($response, 'Frodo says: Hello');	

	}

	function testACharacterSayGoodBay() {
		
		$string = "Good bye";
		$command = new GameServer\SayCommand($this->goodCharacter,$string);

		$response = $command->execute();

		$this->assertEquals($response, 'Aragorn says: Good bye');	

	}
}


class MoveCommandTest extends PHPUnit_Framework_TestCase {
	
	function setUp() {
		$this->goodCharacter = new Game\Character();
		$this->goodCharacter->setName("Aragorn");

		$this->anothterGoogCharacte = new Game\Character();
		$this->anothterGoogCharacte->setName("Frodo");
	}

	function testACharacterMoveToPoint() {
			
		$command = new GameServer\MoveCommand($this->goodCharacter,32, 45);

		$command->execute();

		$charactePositionChordsX = $this->goodCharacter->getPositionX();
		$charactePositionChordsY = $this->goodCharacter->getPositionY();
		
		$this->assertEquals($charactePositionChordsX, 32);	
		$this->assertEquals($charactePositionChordsY , 45);	
	}

	function testAnotherCharacterMoveToPoint() {
		
	
		$command = new GameServer\MoveCommand($this->goodCharacter,	10, 25);

		$command->execute();

		
		$charactePositionChordsX = $this->goodCharacter->getPositionX();
		$charactePositionChordsY = $this->goodCharacter->getPositionY();
		
		$this->assertEquals($charactePositionChordsX, 10);	
		$this->assertEquals($charactePositionChordsY , 25);	
	}


}