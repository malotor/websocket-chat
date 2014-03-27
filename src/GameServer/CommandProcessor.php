<?php

namespace GameServer;

class CommandProcessor {
	
	public static function execCommand($commandName, $args) {
		
		$commandMapper = new CommandMapper();

		$commandMap = $commandMapper->getMap();

		$commandClassName = $commandMap[$commandName];

		$ref = new \ReflectionClass($commandClassName);
		$route = $ref->newInstanceArgs($args);

		return $route->execute();

	}
}