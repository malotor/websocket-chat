<?php



class GameTest extends PHPUnit_Framework_TestCase {

	function setUp() {
		/*		
		$this->aragorn = new Game\Character();
		$this->aragorn->setName('Aragorn');

		$this->legolas = new Game\Character();
		$this->legolas->setName('legolas');

		$middleEarth = new Game\Board(100,200);

		*/
		$dice = new Game\Dice(6,1);
		$attackCalculator = new Game\attackCalculator();
		$attackManager = new Game\attackManager($attackCalculator, $dice);


		$middleEarth = new Game\Board(10,10);
		$movementValidator = new Game\MovementValidator($middleEarth);

		$characterFactory = new Game\CharacterFactory();

		$this->helmsDeep = new Game\Game($movementValidator, $attackManager, $characterFactory);

		//$this->helmsDeep->addMovementValidator($movementValidator);

	}
	
	function testNewCharacterHasNoCharacters() {
		
		$countCharacters = $this->helmsDeep->countCharacters();
		
		$this->assertEquals(0, $countCharacters);

	}
	
	
	function testAddNewCharacterToGame() {
		
		$characterData['name'] = 'Aragorn';
		
		/*$characterData['color'] = '#123';
		$characterData['x'] = 3;
		$characterData['y'] = 2;
		$characterData['lifePoints'] = 10;
		$characterData['defensePoints'] = 2;
		$characterData['attackPoints'] = 3;
		*/

		$this->helmsDeep->addCharacter($characterData);

		$countCharacters = $this->helmsDeep->countCharacters();

		$this->assertEquals(1, $countCharacters);

	}

	function testAddAnotherCharacter() {
		
	}
	/*
	function testAddAnotherCharacterToGame() {
		
		$this->helmsDeep->addCharacter($this->legolas);

		$this->assertTrue($this->helmsDeep->hasCharacter($this->legolas));

	}

	function testAddSeveralCharacterToGame() {
		
		$this->helmsDeep->addCharacter($this->legolas);
		$this->helmsDeep->addCharacter($this->aragorn);

		$this->assertTrue($this->helmsDeep->hasCharacter($this->legolas));
		$this->assertTrue($this->helmsDeep->hasCharacter($this->aragorn));

	}

	function testAddAnotherIsNotInGame() {
		
		$boromir = new Game\Character();
		
		$this->assertFalse($this->helmsDeep->hasCharacter($boromir));

	}


	
	/**
   * @expectedException Game\CharacterIsNotInGame
   *\/
	
	function testCantMoveCharacterThatIsNotInTheGame() {
		
		$myElf = new Game\Character();
		$myElf->setName('Legolas');

		$this->helmsDeep->moveCharacter($myElf,20,30);
	
	}


	function testRetrieveACharacterByHisName() {
		
		$myElf = new Game\Character();
		$myElf->setName('Legolas');

		$this->helmsDeep->addCharacter($myElf);

		$legolas = $this->helmsDeep->getCharacter('Legolas');

		$this->assertEquals($legolas->getName(),'Legolas');

	}
	function testCantRetrieveACharactarThatNoExists() {
		

		$legolas = $this->helmsDeep->getCharacter('Gimly');

		$this->assertNull($legolas);
	
	}


	function testAddNewCharacterToGameWithAKey() {
		
		$keyAragorn = "keyAragorn";
		$keyLegolas = "keyLegolas";

		$this->helmsDeep->addCharacter($this->aragorn, $keyAragorn);
		$this->helmsDeep->addCharacter($this->legolas, $keyLegolas);

		$character = $this->helmsDeep->getCharacterByKey($keyAragorn);
		$anotherCharacter = $this->helmsDeep->getCharacterByKey($keyLegolas);

		$this->assertEquals($this->aragorn, $character);
		$this->assertEquals($this->legolas, $anotherCharacter);


	}

	*/

}
