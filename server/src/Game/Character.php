<?php

namespace Game;

class Character {
	
	private $name;

	private $x;
	private $y;



	public function getName() {
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