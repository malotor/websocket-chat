<?php 

namespace Game;

class Dice {
	private $sides;

	public function __construct($sides, $count) {
		$this->sides = $sides;
		$this->diceCount = $count;
	}

	public function roll() {
		return rand($this->sides, $this->diceCount  * $this->sides);
	}
}