<?php



class MoveCommandTest extends PHPUnit_Framework_TestCase {
	
	function setUp() {
		$this->aragorn = $this->getMock('Game\Character',array('setPosition','getName'));

		$this->aragorn->expects($this->any())
             ->method('getName')
             ->will($this->returnValue('Aragorn'));
             

		$this->frodo = $this->getMock('Game\Character',array('setPosition','getName'));
		$this->frodo->expects($this->any())
             ->method('getName')
             ->will($this->returnValue('Frodo'));


		$this->game = $this->getMock('Game', array('moveCharacter','getCharacter'));
	}

	function testACharacterMoveToPoint() {
		
		$command = new GameServer\MoveCommand($this->game, $this->aragorn,32, 45);
	
		$response = $command->execute();
		$this->assertEquals($response, 'Aragorn move to (32, 45)');	
	}

	function testACharacterMoveToAnotherPoint() {
		
		$command = new GameServer\MoveCommand($this->game, $this->aragorn ,50,15);
		
		$response = $command->execute();
		$this->assertEquals($response, 'Aragorn move to (50, 15)');	
	}

	function testAnotherCharacterMoveToPoint() {
		
		$command = new GameServer\MoveCommand($this->game, $this->frodo,32,45);
		
		$response = $command->execute();
		$this->assertEquals($response, 'Frodo move to (32, 45)');	

	}

	/*
	function testCharacterIsReallyInThisPosition () {		
		//Set the expectations
		$this->game->expects($this->once())
                 ->method('moveCharacter')
                 ->with($this->equalTo($this->aragorn),32,45);


		$command = new GameServer\MoveCommand('Aragorn',32, 45);
		$command->setGame($this->game);
		$response = $command->execute();
		$this->assertEquals($response, 'Aragorn move To (32, 45)');	
	}
	*/

	function testCharacterIsReallyInAnotherPosition () {		
		
		//Set the expectations
		/*
		$this->game->expects($this->once())
                 ->method('getCharacter')
                 ->with('Aragorn')
                 ->will($this->returnValue($this->aragorn));
		*/
		//Set the expectations
		$this->game->expects($this->once())
                 ->method('moveCharacter')
                 ->with($this->aragorn,55,12);

  
    $this->aragorn->expects($this->any())
             ->method('setPosition')
             ->with(55,12);
	
             
		$command = new GameServer\MoveCommand($this->game, $this->aragorn,55, 12);
		
		$response = $command->execute();

		$this->assertEquals($response, 'Aragorn move to (55, 12)');

	}
	
}