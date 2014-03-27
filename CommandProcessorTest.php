<?php

require './vendor/autoload.php';


require 'vendor/simpletest/simpletest/autorun.php';

class CommandProcessorTestCase extends UnitTestCase {
	
	function setUp() {
		
	}

	function testSayAString() {
		
		$commandProcessor = new GameServer\CommandProcessor();

		$command = "say";
		$args[0] = "Manel";
		$args[1] = "Hello";

		$response = $commandProcessor->exec($command,$args);


		$this->assertEqual($response, 'Manel says: Hello');	

	}

	function testSayAnotherString() {
		
		$commandProcessor = new GameServer\CommandProcessor();

		$command = "say";
		$args[0] = "Pepe";
		$args[1] = "Good bye";

		$response = $commandProcessor->exec($command,$args);

		$this->assertEqual($response, 'Pepe says: Good Bay');	

	}


}