<?

class DiceTest extends PHPUnit_Framework_TestCase {

	function setUp() {
		
	}

	function testRollsA1D6Dice() {
		
		$diceSide = 6;
		$diceNumber = 1;

		$dice = new Game\Dice($diceSide, $diceNumber);
		
		$rollResult = $dice->roll();

		$this->assertGreaterThanOrEqual(1, $rollResult);
		$this->assertLessThanOrEqual(6, $rollResult);

	}

	function testRollsA2D6Dice() {
		
		$diceSide = 6;
		$diceNumber = 2;

		$dice = new Game\Dice($diceSide, $diceNumber);
		
		$rollResult = $dice->roll();

		$this->assertGreaterThanOrEqual(2, $rollResult);
		$this->assertLessThanOrEqual(12, $rollResult);

	}
	
	function testRollsA1D20Dice() {
		
		$diceSide = 20;
		$diceNumber = 1;

		$dice = new Game\Dice($diceSide, $diceNumber);
		
		$rollResult = $dice->roll();

		$this->assertGreaterThanOrEqual(1, $rollResult);
		$this->assertLessThanOrEqual(20, $rollResult);

	}

	function testRollsA1D4Dice() {
		$diceSide = 4;
		$diceNumber = 1;

		$dice = new Game\Dice($diceSide, $diceNumber);
		
		$rollResult = $dice->roll();

		$this->assertGreaterThanOrEqual(1, $rollResult);
		$this->assertLessThanOrEqual(4, $rollResult);

	}
	function testRollsA4D6Dice() {
		
		$diceSide = 6;
		$diceNumber = 5;

		$dice = new Game\Dice($diceSide, $diceNumber);
		
		$rollResult = $dice->roll();

		$this->assertGreaterThanOrEqual(5, $rollResult);
		$this->assertLessThanOrEqual(30, $rollResult);

	}
}
?>