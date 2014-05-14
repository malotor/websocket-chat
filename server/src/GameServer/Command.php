<?php

namespace GameServer;

class Command  {

	protected $game;
	
	public function setGame($game) {
		$this->game = $game;
	}
	public function setConnection($connection) {
		$this->connection = $connection;
	}

}