<?php

/*
class CommandLauncherTestCase extends PHPUnit_Framework_TestCase {
	
	function setUp() {
		$this->goodCharacter = new Game\Character();
		$this->goodCharacter->setName("Aragorn");

		$this->anothterGoogCharacter = new Game\Character();
		$this->anothterGoogCharacter->setName("Frodo");

		$this->game = $this->getMock('Game\Game', array('moveCharacter','getCharacter'));

	}


	function testCharacterSayHello() {
		
		$message = '{
		    "command":"say",
		    "args" : {
		        "character":"Aragorn",
		        "msg" : "Hello Word"
		    }
		}';

		$CommandLauncher = new GameServer\CommandLauncher($this->game);
		$response = $CommandLauncher->throwCommand($message);

		$this->assertEquals($response, 'Aragorn says: Hello Word');	

	}

	function testAnotherCharacterSayHello() {
		
		$message = '{
		    "command":"say",
		    "args" : {
		        "character":"Frodo",
		        "msg" : "Hello Word"
		    }
		}';

		$CommandLauncher = new GameServer\CommandLauncher($this->game);
		$response = $CommandLauncher->throwCommand($message);

		$this->assertEquals($response, 'Frodo says: Hello Word');	

	}

	function testCharacterSayGoodBye() {
		
		$message = '{
		    "command":"say",
		    "args" : {
		        "character":"Aragorn",
		        "msg" : "Good bye Word"
		    }
		}';

		$CommandLauncher = new GameServer\CommandLauncher($this->game);
		$response = $CommandLauncher->throwCommand($message);

		$this->assertEquals($response, 'Aragorn says: Good bye Word');	

	}

	function testCharacterMoveToPosition() {
		
		$message = '{
		    "command":"move",
		    "args" : {
		        "character":"Aragorn",
		        "x" : "20",
		        "y" : "30"
		    }
		}';

		$CommandLauncher = new GameServer\CommandLauncher($this->game);
		$response = $CommandLauncher->throwCommand($message);

		$this->assertEquals($response, 'Aragorn moves to (20,30)');	

	}


	function testAnotherCharacterMoveToAnotherPosition() {
		
		$message = '{
		    "command":"move",
		    "args" : {
		        "character":"Frodo",
		        "x" : "25",
		        "y" : "50"
		    }
		}';

		$CommandLauncher = new GameServer\CommandLauncher($this->game);
		$response = $CommandLauncher->throwCommand($message);

		$this->assertEquals($response, 'Frodo moves to (25,50)');	

	}

	function testCharacterMoveToPositionReally() {
		
		$this->legolas = $this->getMock('Game\Character',array('setPosition','getName'));

		$this->legolas->expects($this->any())
             ->method('getName')
             ->will($this->returnValue('Legolas'));

    
    $this->game->expects($this->once())
                 ->method('getCharacter')
                 ->with('Legolas')
                 ->will($this->returnValue($this->legolas));

    $this->game->expects($this->once())
                 ->method('moveCharacter')
                 ->with($this->legolas,20,30);

		$message = '{
	    "command" : "move",
	    "args" : {
        "character" : "Aragorn",
        "x" : "20",
        "y" : "30"
	    }
		}';

		$CommandLauncher = new GameServer\CommandLauncher($this->game);
		$response = $CommandLauncher->throwCommand($message);

		$this->assertEquals($response, 'Aragorn moves to (20,30)');	

	}



}*/