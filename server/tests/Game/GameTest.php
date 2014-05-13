<?php



class GameTest extends PHPUnit_Framework_TestCase {

	function setUp() {
		
		$dice = new Game\Dice(6,1);
		$attackCalculator = new Game\attackCalculator();
		$attackManager = new Game\attackManager($attackCalculator, $dice);

		$middleEarth = new Game\Board(10,10);
		$movementValidator = new Game\MovementValidator($middleEarth);

		$this->helmsDeep = new Game\Game($movementValidator, $attackManager);

	}
	
	function testNewCharacterHasNoCharacters() {
		
		$countCharacters = $this->helmsDeep->countCharacters();
		
		$this->assertEquals(0, $countCharacters);

	}
	
	
	function testAddNewCharacterToGame() {
		
		$characterData['name'] = 'Aragorn';
		$characterData['id'] = 'aragorn';
		$characterData['color'] = '#123';
		$characterData['x'] = 3;
		$characterData['y'] = 2;
		$characterData['lifePoints'] = 10;
		$characterData['defensePoints'] = 2;
		$characterData['attackPoints'] = 3;

		$this->helmsDeep->createCharacter($characterData);

		$countCharacters = $this->helmsDeep->countCharacters();

		$this->assertEquals(1, $countCharacters);

	}

	function testAddServeraCharacter() {
		

		$characterData['name'] = 'Aragorn';
		$characterData['id'] = 'aragorn';
		$characterData['color'] = '#123';
		$characterData['x'] = 3;
		$characterData['y'] = 2;
		$characterData['lifePoints'] = 10;
		$characterData['defensePoints'] = 2;
		$characterData['attackPoints'] = 3;

		$anotherCharacterData['name'] = 'Legolas';
		$anotherCharacterData['id'] = 'legolas';
		$anotherCharacterData['color'] = '#321';
		$anotherCharacterData['x'] = 3;
		$anotherCharacterData['y'] = 2;
		$anotherCharacterData['lifePoints'] = 10;
		$anotherCharacterData['defensePoints'] = 2;
		$anotherCharacterData['attackPoints'] = 3;

		$this->helmsDeep->createCharacter($characterData);
		$this->helmsDeep->createCharacter($anotherCharacterData);

		$countCharacters = $this->helmsDeep->countCharacters();

		$this->assertEquals(2, $countCharacters);
	}

	function testGetACharacter() {
		$characterData['name'] = 'Aragorn';
		$characterData['id'] = 'aragorn';
		$characterData['color'] = '#123';
		$characterData['x'] = 3;
		$characterData['y'] = 2;
		$characterData['lifePoints'] = 10;
		$characterData['defensePoints'] = 2;
		$characterData['attackPoints'] = 3;
		
		$this->helmsDeep->createCharacter($characterData);

		$character = $this->helmsDeep->getCharacter('aragorn');

		$this->assertEquals($characterData['name'] , $character->getName());
		$this->assertEquals($characterData['color'] , $character->getColor());
	}

	function testMoveACharacter() {
		$characterData['name'] = 'Aragorn';
		$characterData['id'] = 'aragorn';
		$characterData['color'] = '#123';
		$characterData['x'] = 0;
		$characterData['y'] = 0;
		$characterData['lifePoints'] = 10;
		$characterData['defensePoints'] = 2;
		$characterData['attackPoints'] = 3;
		
		$this->helmsDeep->createCharacter($characterData);

		$this->helmsDeep->moveCharacter('aragorn', 2, 4);

		$character = $this->helmsDeep->getCharacter('aragorn');

		$this->assertEquals(2, $character->getPositionX());
		$this->assertEquals(4, $character->getPositionY());
	}

	
}
