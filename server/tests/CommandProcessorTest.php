<?php


class CommandProcessorTestCase extends PHPUnit_Framework_TestCase {
	
	function setUp() {
		$this->goodCharacter = new Game\Character();
		$this->goodCharacter->setName("Aragorn");

		$this->anothterGoogCharacter = new Game\Character();
		$this->anothterGoogCharacter->setName("Frodo");
	}

	function testSayAString() {
		
		//$commandProcessor = new GameServer\CommandProcessor();

		$command = "say";
		$args[0] = $this->goodCharacter;
		$args[1] = "Hello";

		$response = GameServer\CommandProcessor::execCommand($command,$args);

		$this->assertEquals($response, 'Aragorn says: Hello');	

	}
	
	function testSayAnotherString() {
		
		$command = "say";
		$args[0] = $this->goodCharacter;
		$args[1] = "Good bye";

		$response = GameServer\CommandProcessor::execCommand($command,$args);

		$this->assertEquals($response, 'Aragorn says: Good bye');	

	}
	
	function testAnotherCharacterSayHello() {
		
		//$commandProcessor = new GameServer\CommandProcessor();

		$command = "say";
		$args[0] = $this->anothterGoogCharacter;
		$args[1] = "Hello";

		$response = GameServer\CommandProcessor::execCommand($command,$args);

		$this->assertEquals($response, 'Frodo says: Hello');	

	}

	function testMovingACharacter() {
		
		//$commandProcessor = new GameServer\CommandProcessor();

		$command = "move";
		$args[0] = $this->goodCharacter;
		$args[1] = 20;
		$args[2] = 30;

		GameServer\CommandProcessor::execCommand($command,$args);

		$charactePositionChordsX = $this->goodCharacter->getPositionX();
		$charactePositionChordsY = $this->goodCharacter->getPositionY();
		
		$this->assertEquals($charactePositionChordsX, 20);	
		$this->assertEquals($charactePositionChordsY , 30);

	}

}