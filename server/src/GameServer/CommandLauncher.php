<?php

namespace GameServer;

class CommandLauncher {
	
	protected $game;

	public function __construct ($game) {
		$this->game = $game;
	}

	protected function say($args) {
		return "{$args['character']} says: {$args['msg']}";
	}

	protected function move($args) {
		
		$character = $this->game->getCharacter($args['character']);
		var_dump($character);
		$name = $character->getName();

		return "{$name} moves to ({$args['x']},{$args['y']})";
	}

	public function throwCommand($message) {

		$messageJson = json_decode($message, true);
		$args = $messageJson['args'];

		switch ($messageJson['command']) {
			case 'say':
				return $this->say($args);
				break;
			case 'move':
				return $this->move($args);
				break;
		}
		
	}
	
}