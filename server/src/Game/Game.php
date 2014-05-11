<?php

namespace Game;

class Game  {


	private $characters;
	private $movementManager;
	private $attackManager;

	protected $characterFactory;

  public function __construct($movementManager, $attackManager, $characterFactory) {
		
		$this->movementManager = $movementManager;
		$this->attackManager = $attackManager;
		$this->characterFactory = $characterFactory;

		$this->characters = new \SplObjectStorage();
	}
	public function addCharacter() {
		$character = new Character();
		$this->characters->attach($character);

	}
	public function countCharacters() {
		return count($this->characters);
	}
	/*
	function setCharacterFactory($characterFactory) {
		$this->characterFactory = $characterFactory;
	}
	
	function addCharacter($character, $key=null) {
		
		$this->characters->attach($character, $key);
	}

	function hasCharacter($character) {
		
		return $this->characters->contains($character);
	}
	
	function moveCharacter($character, $x, $y) {

		if (!$this->hasCharacter($character)) {
			throw new CharacterIsNotInGame();
		} 

		if (!$this->movementValidator->validateMovement($x, $y)) {
			throw new CharacterOutSideBoardException();
		}

		$character->setPosition($x, $y);
	
	}


	function getCharacter($name) {
		foreach($this->characters as $character) {
		   if ($character->getName() == $name) {
		   	return $character;
		   }
		}
	}

	function getCharacters() {
		return $this->characters;
	}

	function getCharacterByKey($key) {
		foreach($this->characters as $character) {
		   if ($this->characters[$character] == $key) {
		   	return $character;
		   }
		}
	}
	*/
}


class CharacterIsNotInGame extends \Exception {
   public function __construct($message = null, $code = 0, Exception $previous = null)
   {
   		$message = 'The character isn´t in the game';
      parent::__construct($message, $code, $previous);
   }
}



