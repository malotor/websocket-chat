<?php


class AttackCalculatorTest extends PHPUnit_Framework_TestCase {

	function testCalculateAttack () {
		$attackPoints = 10;
		$defensePoints = 5;
		$roll = 4;

		$attackCalulator = new Game\AttackCalculator();

		$damage = $attackCalulator->calculateAttack($attackPoints, $defensePoints, $roll);

		$this->assertEquals($damage, 9);

	}

	function testCalculateAnotherAttack () {
		$attackPoints = 10;
		$defensePoints = 5;
		$roll = 3;

		$attackCalulator = new Game\AttackCalculator();

		$damage = $attackCalulator->calculateAttack($attackPoints, $defensePoints, $roll);

		$this->assertEquals($damage, 8);

	}

	function testCalculateAttackWithSameAtts () {
		$attackPoints = 10;
		$defensePoints = 10;
		$roll = 3;

		$attackCalulator = new Game\AttackCalculator();

		$damage = $attackCalulator->calculateAttack($attackPoints, $defensePoints, $roll);

		$this->assertEquals($damage, 3);

	}

	function testCalculateAttackWithZeroAttackPoints () {
		$attackPoints = 0;
		$defensePoints = 10;
		$roll = 3;

		$attackCalulator = new Game\AttackCalculator();

		$damage = $attackCalulator->calculateAttack($attackPoints, $defensePoints, $roll);

		$this->assertEquals($damage, 0);

	}

	function testCalculateAttackWithZeroAttackPoints2 () {
		$attackPoints = 0;
		$defensePoints = 10;
		$roll = 11;

		$attackCalulator = new Game\AttackCalculator();

		$damage = $attackCalulator->calculateAttack($attackPoints, $defensePoints, $roll);

		$this->assertEquals($damage, 1);

	}
}