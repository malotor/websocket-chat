<?php

namespace GameServer;
use Symfony\Component\Yaml\Parser;

class CommandMapper {

	private $commandMap;

	public function __construct($file) {

		$yaml = new Parser();
		$this->commandMap = $yaml->parse(file_get_contents($file));
	}

	public function getMap() {
		return $this->commandMap;
	}

	public function getClass($command) {
		
		if (isset($this->commandMap[$command])) {
			return $this->commandMap[$command];

		}
					
		throw new CommandNotExistsException();
		
		
	}
}

class CommandNotExistsException extends \Exception {
   public function __construct($message = null, $code = 0, Exception $previous = null)
   {
   		$message = 'The command doesn´t exists';

   		parent::__construct($message, $code, $previous);
   }
}