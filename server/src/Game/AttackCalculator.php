<?php

namespace Game;

class AttackCalculator {
	public function __construct() {
	
	}
	public function calculateAttack($attackPoints, $defensePoints, $roll) {
		
		$baseDamage = $attackPoints - $defensePoints;
		$totalDamage = $baseDamage + $roll;
		if ($totalDamage < 0) $totalDamage = 0;
		return $totalDamage;
	
	}

}