<?php
use Factory\ShapeFactory;

class FactoryTest extends \PHPUnit_Framework_TestCase {

	/**
	 * The fixture configuration for various shapes
	 * @var array
	 */
	protected $fixturePath;

	/**
	 * Set the $fixturePath before every test executes
	 */
	public function setUp() {
		$this->fixturePath = json_decode(file_get_contents(dirname(realpath(dirname(__FILE__))) . '/factory/definitions/shapes.json'), TRUE);
	}

	/**
	 * Verify that each object is being instantiated correctly
	 */
	public function testIsObject() {
		$FactoryObject = new ShapeFactory();
		$this->assertTrue(is_object($FactoryObject));

		$Circle = ShapeFactory::getShape("CIRCLE");
		$this->assertTrue(is_object($Circle));

		$Rectangle = ShapeFactory::getShape("Rectangle");
		$this->assertTrue(is_object($Rectangle));
		
		$Square = ShapeFactory::getShape("square");
		$this->assertTrue(is_object($Square));
	}

	/**
	 * Verify that the objects created are of the correct instance
	 */
	public function testIsSpecifiedObject() {
		$FactoryObject = new ShapeFactory();
		$this->assertTrue($FactoryObject instanceof Factory\ShapeFactory);

		$Circle = ShapeFactory::getShape("CIRCLE");
		$this->assertTrue($Circle instanceof Factory\Products\Circle);

		$Rectangle = ShapeFactory::getShape("Rectangle");
		$this->assertTrue($Rectangle instanceof Factory\Products\Rectangle);

		$Square = ShapeFactory::getShape("square");
		$this->assertTrue($Square instanceof Factory\Products\Square);
	}

	/**
	 * Verify that the object variables/properties are being set correctly
	 */
	public function testObjectVariables() {
		$Circle = ShapeFactory::getShape("CIRCLE");
		$Circle->setVariables($this->fixturePath);
		$this->assertEquals('CIRCLE', strtoupper($Circle->getName()));

		$Rectangle = ShapeFactory::getShape("Rectangle");
		$Rectangle->setVariables($this->fixturePath);
		$this->assertEquals(true, $Rectangle->getOppositeSidesParallel());

		$Square = ShapeFactory::getShape("square");
		$Square->setVariables($this->fixturePath);
		$this->assertEquals(true, $Square->getOppositeSidesParallel());
	}

	/**
	 * Verify that the shapes that are being requested have a corresponding class
	 */
	public function testFindValidShapes() {
		$aTrueValue = ShapeFactory::isGivenShapeValid('Circle');
		$this->assertTrue($aTrueValue);

		$aFalseValue = ShapeFactory::isGivenShapeValid('not-a-shape');
		$this->assertFalse($aFalseValue);
	}

	/**
	 * @expectedException \Exception
	 */
	public function testFactoryException() {
		ShapeFactory::getShape('not-a-shape');
	}
}