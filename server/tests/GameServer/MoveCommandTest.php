<?php



class MoveCommandTest extends PHPUnit_Framework_TestCase {
	
	function setUp() {
	
		$this->aragorn = new Game\Character();
		$this->aragorn->setName('Aragorn');

		$this->legolas = new Game\Character();
		$this->legolas->setName('legolas');

		$middleEarth = new Game\Board(100,200);

		$movementValidator = new Game\MovementValidator($middleEarth);

		//$this->helmsDeep = new Game\Game($movementValidator);

	}

	function testACharacterMoveToPoint() {

		$this->game = $this->getMock('Game'));


		$this->game->expects($this->once())
                 ->method('moveCharacter')
                 ->with($this->aragorn,32,45);

		$characterName = "Aragorn";
		$x = 32;
		$y = 45;

		$command = new GameServer\MoveCommand($characterName, $x, $y);
		$command->setGame($this->game);
		$responseExpected = vsprintf($command::RESPONSE_STRING,array($characterName,$x,$y));
		$response = $command->execute();

		$this->assertEquals($response, $responseExpected);	

	}
	/*

	function testACharacterMoveToAnotherPoint() {
		$characterName = "Aragorn";

		$x = 50;
		$y = 15;

		$command = new GameServer\MoveCommand($characterName,$x, $y);
		$command->setGame($this->game);
		$responseExpected = vsprintf($command::RESPONSE_STRING,array($characterName,$x,$y));

		$response = $command->execute();
		$this->assertEquals($response, $responseExpected);	
	}

	function testAnotherCharacterMoveToPoint() {
		$characterName = "Frodo";

		$x = 32;
		$y = 45;

		$command = new GameServer\MoveCommand($characterName,$x, $y);
		$command->setGame($this->game);

		$responseExpected = vsprintf($command::RESPONSE_STRING,array($characterName,$x,$y));

		$response = $command->execute();
		$this->assertEquals($response, $responseExpected);	

	}

	

	function testCharacterIsReallyInAnotherPosition () {		
		
		$characterName = "Aragorn";
	
		$x = 32;
		$y = 45;

		$command = new GameServer\MoveCommand($characterName,$x, $y);
		$command->setGame($this->game);

		$responseExpected = vsprintf($command::RESPONSE_STRING,array($characterName,$x,$y));

		$response = $command->execute();

		$this->assertEquals($response, $responseExpected);	

		$charactePositionChordsX = $this->aragorn->getPositionX();
		$charactePositionChordsY = $this->aragorn->getPositionY();

		
		$this->assertEquals($charactePositionChordsX, $x);	
		$this->assertEquals($charactePositionChordsY , $y);	

	}


	function testAnotherCharacterIsReallyInAnotherPosition () {		
		
		$characterName = "Frodo";
	
		$x = 11;
		$y = 2;

		$command = new GameServer\MoveCommand($characterName, $x, $y);
		$command->setGame($this->game);
		$responseExpected = vsprintf($command::RESPONSE_STRING,array($characterName,$x,$y));

		$response = $command->execute();
		$this->assertEquals($response, $responseExpected);	

		$charactePositionChordsX = $this->frodo->getPositionX();
		$charactePositionChordsY = $this->frodo->getPositionY();

		
		$this->assertEquals($charactePositionChordsX, $x);	
		$this->assertEquals($charactePositionChordsY , $y);	

	}
	*/
}