<?php

use AbstractFactoryTutorial\Factory\AbstractFactory;
use AbstractFactoryTutorial\Factory\FactoryProducer;

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
		$this->fixturePath = json_decode(file_get_contents(dirname(realpath(dirname(__FILE__))) . '/src/definitions/shapes.json'), TRUE);
	}

	/**
	 * Verify that each object is being instantiated correctly
	 */
	public function testIsObject() {
		$NonPolygonFactory = FactoryProducer::getFactory("circle", $this->fixturePath);
		$this->assertTrue(is_object($NonPolygonFactory));

		$PolygonFactory = FactoryProducer::getFactory('square', $this->fixturePath);
		$this->assertTrue(is_object($PolygonFactory));
	}

	/**
	 * Verify that the objects created are of the correct instance
	 */
	public function testIsSpecifiedObject() {
		$CircleFactory = FactoryProducer::getFactory("circle", $this->fixturePath);
		$this->assertTrue($CircleFactory instanceof AbstractFactoryTutorial\Factory\NonPolygonFactory);

		$RectangleFactory = FactoryProducer::getFactory("Rectangle", $this->fixturePath);
		$this->assertTrue($RectangleFactory instanceof AbstractFactoryTutorial\Factory\PolygonFactory);

		$SquareFactory = FactoryProducer::getFactory("square", $this->fixturePath);
		$this->assertTrue($SquareFactory instanceof AbstractFactoryTutorial\Factory\PolygonFactory);
	}

	/**
	 * Verify that the object variables/properties are being set correctly
	 */
	public function testObjectVariables() {
		$CircleFactory = FactoryProducer::getFactory("CIRCLE", $this->fixturePath);
		$Circle = $CircleFactory->getShape();
		$this->assertEquals('CIRCLE', strtoupper($Circle->getName()));
		$this->assertEquals(1, $Circle->getEccentricity());
		$this->assertEquals(25, $Circle->getDummyValue());

		$RectangleFactory = FactoryProducer::getFactory("Rectangle", $this->fixturePath);
		$Rectangle = $RectangleFactory->getShape();
		$this->assertEquals(true, $Rectangle->getOppositeSidesParallel());

		//square class not yet defined
		// $SquareFactory = FactoryProducer::getFactory("square", $this->fixturePath);
		// $Square = $SquareFactory->getShape();
		// $this->assertEquals(true, $Square->getOppositeSidesParallel());

		$TriangleFactory = FactoryProducer::getFactory("triangle", $this->fixturePath);
		$Triangle = $TriangleFactory->getShape();
	$this->assertEquals(3, $Triangle->getNumberOfAngles());
	}

	/**
	 * Verify that the shapes that are being requested have a corresponding class
	 */
	public function testFindValidShapes() {
		$aTrueValue = AbstractFactory::isGivenShapeValid('Circle');
		$this->assertTrue($aTrueValue);

		$aTrueValue = AbstractFactory::isGivenShapeValid('Ellipse');
		$this->assertTrue($aTrueValue);

		$aFalseValue = AbstractFactory::isGivenShapeValid('not-a-shape');
		$this->assertFalse($aFalseValue);
	}

	/**
	 * Verify that the factories that are being requested have a corresponding class
	 */
	public function testFindValidFactories() {
		$aTrueValue = AbstractFactory::isGivenFactoryValid('PolygonFactory');
		$this->assertTrue($aTrueValue);

		$aFalseValue = AbstractFactory::isGivenFactoryValid('not-a-factory');
		$this->assertFalse($aFalseValue);
	}

	/**
	 * @expectedException \Exception
	 */
	public function testShapeException() {
		$RectangleFactory = FactoryProducer::getFactory("not-a-shape", $this->fixturePath);
	}
}