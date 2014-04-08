<?php

namespace Game;

class Character {
	
	private $name;

	private $x;
	private $y;



	public function getName() {
		if (!$this->name) {
			throw new CharacterDontHaveName();
		}

		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
	}	

	public function setPosition($x, $y) {
		$this->x = $x;
		$this->y = $y;
	}

	public function getPositionX() {
		return (int) $this->x;
	}
	public function getPositionY() {
		return (int) $this->y;
	}

	public function moveUp($shift) {
		$this->y += $shift;
	}
	public function moveDown($shift) {
		$this->y -= $shift;
	}

	public function moveLeft($shift) {
		$this->x -= $shift;
	}

	public function moveRight($shift) {
		$this->x += $shift;
	}
	
}


class CharacterDontHaveName extends \Exception {
   public function __construct($message = null, $code = 0, Exception $previous = null)
   {
   		$message = 'The character must have a name';

   		parent::__construct($message, $code, $previous);
   }
}