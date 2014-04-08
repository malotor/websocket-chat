<?php


class CommandProcessorTestCase extends PHPUnit_Framework_TestCase {
	
	function setUp() {
		$this->aragorn = new Game\Character();
		$this->aragorn->setName("Aragorn");

		$this->frodo = new Game\Character();
		$this->frodo->setName("Frodo");

		$this->board = new Game\Board(100,100);

		$this->game = new Game\Game();

		$this->game->addBoard($this->board);

		$this->game->addCharacter($this->aragorn);

	}

	function testSayCommand() {
		
		$msg = '{ "command": "say" , "args" : {  "character": "Aragorn",  "msg" : "Hello" } }';

		$CommandProcessor = new GameServer\CommandProcessor($this->game);
		$response = $CommandProcessor->execCommand($msg);

		$this->assertEquals($response, 'Aragorn says: Hello');	

	}
	
	function testMoveCommand() {
		
		$msg = '{ "command": "move" , "args" : {  "character": "Aragorn",  "x" : "50" , "y" : "15"} }';

		$CommandProcessor = new GameServer\CommandProcessor($this->game);
		$response = $CommandProcessor->execCommand($msg);

		$this->assertEquals($response, 'Aragorn move to (50, 15)');	

	}


	/**
	 * @expectedException GameServer\CommandNotExistsException
	 */
	function testNoExistCommand() {

		$msg = '{ "command": "foo" , "args" : {  "fooarg": "bar" } }';
	
		$CommandProcessor = new GameServer\CommandProcessor($this->game);
		$response = $CommandProcessor->execCommand($msg);

	}
}