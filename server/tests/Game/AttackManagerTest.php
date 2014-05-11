<?php

class AttackManagerTest extends PHPUnit_Framework_TestCase {

	function setUp() {
		$this->aragorn = new Game\Character();
		$this->aragorn->setName('Aragorn');
		$this->aragorn->setAttackPoints(5);

		$this->badOrc = new Game\Character();
		$this->badOrc->setLifePoints(20);
		$this->badOrc->setDefensePoints(4);

    $this->attackCalculador = $this->getMockBuilder('Game\AttackCalculator')
    		->setMethods(array('calculateAttack'))
        ->disableOriginalConstructor()
        ->getMock();

    $this->dice = $this->getMockBuilder('Game\Dice')
    		->setMethods(array('roll'))
        ->disableOriginalConstructor()
        ->getMock();
	}


	function testCharacterAttackProcess() {
		
		$this->dice->expects($this->once())
		->method('roll')
		->will($this->returnValue(1));

		$this->attackCalculador->expects($this->once())
		->method('calculateAttack')
		->with(5, 4, 1)
		->will($this->returnValue(5));		

		$attacker = $this->aragorn;
		$defender =	$this->badOrc;

		$attackMannager = new Game\AttackManager($this->attackCalculador, $this->dice);

		$attackMannager->attackCharacter($attacker, $defender);

		$this->assertEquals(15, $this->badOrc->getLifePoints());

	}

	

	
}
