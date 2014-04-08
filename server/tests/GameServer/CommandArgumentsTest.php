<?php

class CommandArgumentsTest () {
	
	function setUp() {
		$this->aragorn = new Game\Character();
		$this->aragorn->setName("Aragorn");

		$this->frodo = new Game\Character();
		$this->frodo->setName("Frodo");

		$this->game = new Game\Game();

		$this->game->addCharacter($this->aragorn);

	}

	function testGetMoveCommandArgs() {
		
		
		$command = "move";
		$args[0] = "Aragorn";
		$args[1] = "55";
		$args[2] = "12";
		

		$arguments = new GameServer\CommandArguments($command,$args);

		
		$this->assertEquals($arguments[0], );	
	}
}