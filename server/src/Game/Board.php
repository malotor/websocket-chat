<?php

namespace Game;

class Board {
	
	public function __construct($limitHorizontal, $limitVertical) {
		
		$this->limitHorizontal = $limitHorizontal;
		$this->limitVertical = $limitVertical;

	}

	public function getLimitHorizontal() {
		return $this->limitHorizontal;
	}

	public function getLimitVertical() {
		return $this->limitVertical;
	}

}