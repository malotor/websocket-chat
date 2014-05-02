<?php


class CreateCharacterCommandTest extends PHPUnit_Framework_TestCase {
	
	function setUp() {
		$this->game = $this->getMock('Game', array('addCharacter'));
	}

	function testACharacterIsCreatedAndAddedTotheGame() {
		
		$characterAttributes['name'] = "Aragorn";

		$this->game->expects($this->once())->method('addCharacter');

		$command = new GameServer\CreateCharacterCommand($characterAttributes);
		$command->setGame($this->game);
		$response = $command->execute();
		
		$responseExpected = vsprintf($command::RESPONSE_STRING,array($characterAttributes['name']));
		$this->assertEquals($response, $responseExpected);	
		
	}	
	
}