<?php


class CommandMapperTestCase extends PHPUnit_Framework_TestCase {
	
	function setUp() {
		$this->mapFile = '/var/www/sites/wsgame/server/commandMap.yml';
	}


	function testGetSayClass() {
		$command = "say";

		$commandMapper = new GameServer\CommandMapper($this->mapFile);

		$class = $commandMapper->getClass($command);

		$this->assertEquals($class, 'GameServer\SayCommand');	

	}

	function testGetMoveClass() {
		$command = "move";

		$commandMapper = new GameServer\CommandMapper($this->mapFile);

		$class = $commandMapper->getClass($command);

		$this->assertEquals($class, 'GameServer\MoveCommand');	

	}

	/**
   * @expectedException GameServer\CommandNotExistsException
   */
	function testGetInvalidClass() {
		$command = "fakeCommand";

		$commandMapper = new GameServer\CommandMapper($this->mapFile);

		$class = $commandMapper->getClass($command);

	}

		
}