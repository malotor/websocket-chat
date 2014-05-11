<?php

namespace Game;

class AttackManager {
	
	public function __construct($attackCalculator, $dice) {
		$this->attackCalculator = $attackCalculator;
		$this->dice = $dice;
	}
	public function attackCharacter($attacker, $defender) {
		
		$roll = $this->dice->roll();

		$damage = $this->attackCalculator->calculateAttack($attacker->getAttackPoints(), $defender->getDefensePoints(), $roll);
		
		$defender->receiveDamage($damage);

	}

}