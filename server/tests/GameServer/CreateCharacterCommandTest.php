<?php


class CreateCharacterCommandTest extends PHPUnit_Framework_TestCase {
	
	function setUp() {

		$this->characterFactory = $this->getMock('characterFactory', array('create'));

		$this->game = $this->getMock('Game', array('addCharacter'));


		$this->game->setCharacterFactory($this->characterFactory);
		
	}

	function testACharacterIsCreatedAndAddedTotheGame() {
		
		$characterAttributes['key'] = "AragornKey";
		$characterAttributes['name'] = "Aragorn";
		$characterAttributes['x'] = "3";
		$characterAttributes['y'] = "6";
		$characterAttributes['color'] = "#ff0000";

		$this->characterFactory->expects($this->once())->method('create');

		$this->game->expects($this->once())->method('addCharacter');

		$command = new GameServer\CreateCharacterCommand($characterAttributes);
		$command->setGame($this->game);
		$event = $command->execute();
		
		
	}	

	function testEventResponseIsCorrect() {
		
		$characterAttributes['key'] = "AragornKey";
		$characterAttributes['name'] = "Aragorn";
		$characterAttributes['x'] = "3";
		$characterAttributes['y'] = "6";
		$characterAttributes['color'] = "#ff0000";

		$this->game->expects($this->once())->method('addCharacter');

		$command = new GameServer\CreateCharacterCommand($characterAttributes);
		$command->setGame($this->game);
		$event = $command->execute();
		
		$eventExpected = array(
			'event' => 'character_created',
			'type' => 'broadcast',
			'data' => array (
				'key' => $characterAttributes['key'],
				'name' => $characterAttributes['name'],
				'x' => $characterAttributes['x'],
				'y' => $characterAttributes['y'],
				'color' => $characterAttributes['color'],
			),
		);

		$responseExpected = vsprintf($command::RESPONSE_STRING,array($characterAttributes['name']));
		$this->assertEquals($eventExpected, $event);	
		
	}	
	
}