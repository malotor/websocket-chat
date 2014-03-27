<?php

require './vendor/autoload.php';


require 'vendor/simpletest/simpletest/autorun.php';

class CommandTestCase extends UnitTestCase {
	
	function setUp() {
		
	}

	function testCommandSay() {
		
		$args[0] = "Manel";
		$args[1] = "Hello";
		$sayCommand = new GameServer\sayCommand($args);

		$response = $sayCommand->exec();


		$this->assertEqual($response, 'Manel says: Hello');	

	}

}