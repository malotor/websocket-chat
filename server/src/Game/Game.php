<?php

namespace Game;

class Game {

	private $characters = array() ;

	function addCharacter($character,$key) {
		$this->characters[$key] = $character;
	}

	function hasCharacter($characterSearched) {
		$characterSearchedHash = spl_object_hash($characterSearched);
		foreach ($this->characters as $key => $character) {
			if (spl_object_hash($character) == $characterSearchedHash) {
				return true;
			}
		}
	}

	function getCharacter($key) {
		return $this->characters[$key];
	}
}