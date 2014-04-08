<?php


class SayCommandTest extends PHPUnit_Framework_TestCase {
	
	function setUp() {
		$this->aragorn = new Game\Character();
		$this->aragorn->setName("Aragorn");

		$this->frodo = new Game\Character();
		$this->frodo->setName("Frodo");
	}

	function testACharacterSayHello() {
		
		$string = "Hello";
		$command = new GameServer\SayCommand($this->aragorn,$string);
		$response = $command->execute();

		$this->assertEquals($response, 'Aragorn says: Hello');	

	}

	function testAnotherCharacterSayHello() {
		
		$string = "Hello";
		$command = new GameServer\SayCommand($this->frodo, $string);
		$response = $command->execute();

		$this->assertEquals($response, 'Frodo says: Hello');	

	}

	function testACharacterSayGoodBay() {
		
		$string = "Good bye";
		$command = new GameServer\SayCommand($this->aragorn, $string);

		$response = $command->execute();

		$this->assertEquals($response, 'Aragorn says: Good bye');	

	}
}