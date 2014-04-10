<?php

namespace GameServer;

class CommandProcessor  {

	public function __construct($game) {
		$this->game = $game;
	}
	
	public function execCommand($msg) {
		
		$jsonMsg = json_decode($msg,true);

        $command = $jsonMsg['command'];
        $args = $jsonMsg['args'];

        switch($command) {

        	case 'say':
        		$character = $this->game->getCharacter($args['character']);

        		$command = new SayCommand($character,$args['msg']);
        		return $command->execute();

        		break;

        	case 'move':
        		$character = $this->game->getCharacter($args['character']);
        		$command = new MoveCommand($this->game,$character,$args['x'],$args['y']);
        		return $command->execute();

        		break;
          case 'create':

                $character = new \Game\Character();
                $character->setName($args['character']);

                $this->game->addCharacter($character);

                return "{$args['character']} has joined the game";

                break;

    	   default:
    		
            throw new CommandNotExistsException();

            break;

        }

        /*
		$commandMapper = new CommandMapper();

		$commandMap = $commandMapper->getMap();
		try {
			$commandClassName = $commandMap[$commandName];
		} catch (\Exception $e) {
			throw new CommandNotExistsException();
		}
		
		$ref = new \ReflectionClass($commandClassName);

	
		$commandClass = $ref->newInstanceArgs($args);

		return $commandClass->execute();
		*/
	}
	
}



class CommandNotExistsException extends \Exception {
   public function __construct($message = null, $code = 0, Exception $previous = null)
   {
   		$message = 'The command not exists';

   		parent::__construct($message, $code, $previous);
   }
}
