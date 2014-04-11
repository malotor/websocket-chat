<?php


class SayCommandTest extends PHPUnit_Framework_TestCase {
	
	function setUp() {
		$this->aragorn = new Game\Character();
		$this->aragorn->setName("Aragorn");

		$this->frodo = new Game\Character();
		$this->frodo->setName("Frodo");

		$this->board = new Game\Board(100,100);


		$this->game = new Game\Game();

		$this->game->addBoard($this->board);

		$this->game->addCharacter($this->aragorn);
		$this->game->addCharacter($this->frodo);
	}

	function testACharacterSayHello() {
		
		$character = "Aragon";
		$msg = "Hello";

		$command = new GameServer\SayCommand($character,$msg);
		$response = $command->execute();
		
		$responseExpected = vsprintf($command::RESPONSE_STRING,array($character,$msg));


		$this->assertEquals($response, $responseExpected);	

	}

	function testAnotherCharacterSayHello() {
		
		$character = "Frodo";
		$msg = "Hello";

		$command = new GameServer\SayCommand($character,$msg);
		$response = $command->execute();
		
		$responseExpected = vsprintf($command::RESPONSE_STRING,array($character,$msg));


		$this->assertEquals($response, $responseExpected);	

	}

	function testACharacterSayGoodBay() {
		
		$character = "Aragon";
		$msg = "Good bye";

		$command = new GameServer\SayCommand($character,$msg);
		$response = $command->execute();
		
		$responseExpected = vsprintf($command::RESPONSE_STRING,array($character,$msg));


		$this->assertEquals($response, $responseExpected);

	}
}