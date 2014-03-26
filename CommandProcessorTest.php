<?php

require './vendor/autoload.php';


require 'vendor/simpletest/simpletest/autorun.php';

class CommandProcessorTestCase extends UnitTestCase {
	
	


	function setUp() {
		$this->goodCharacter = new Game\Character();
		$this->goodCharacter->setName("Aragorn");
	}

	function testProcessSayCommand() {
		
		$commandProcessor = new MyApp\CommandProcessor();

		$command = "say";
		$firt_arg = "Hola Mundo";

		$response = $commandProcessor->say("hola");



	}
}