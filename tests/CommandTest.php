<?php

require '../vendor/autoload.php';


require '../vendor/simpletest/simpletest/autorun.php';



class SayCommandTestCase extends UnitTestCase {
	
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

		$this->assertEqual($response, 'Aragorn says: Hello');	

	}

	function testAnotherCharacterSayHello() {
		
		$string = "Hello";
		$command = new GameServer\SayCommand($this->anothterGoogCharacte,$string);

		$response = $command->execute();

		$this->assertEqual($response, 'Frodo says: Hello');	

	}

	function testACharacterSayGoodBay() {
		
		$string = "Good bye";
		$command = new GameServer\SayCommand($this->goodCharacter,$string);

		$response = $command->execute();

		$this->assertEqual($response, 'Aragorn says: Good bye');	

	}
}


class MoveCommandTestCase extends UnitTestCase {
	
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
		
		$this->assertEqual($charactePositionChordsX, 32);	
		$this->assertEqual($charactePositionChordsY , 45);	
	}

	function testAnotherCharacterMoveToPoint() {
		
	
		$command = new GameServer\MoveCommand($this->goodCharacter,	10, 25);

		$command->execute();

		
		$charactePositionChordsX = $this->goodCharacter->getPositionX();
		$charactePositionChordsY = $this->goodCharacter->getPositionY();
		
		$this->assertEqual($charactePositionChordsX, 10);	
		$this->assertEqual($charactePositionChordsY , 25);	
	}


}