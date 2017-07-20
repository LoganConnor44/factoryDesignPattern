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
		$FactoryObject = new FactoryProducer('circle');
		$this->assertTrue(is_object($FactoryObject));

		$NonPolygonFactory = FactoryProducer::getFactory('circle');
		$this->assertTrue(is_object($NonPolygonFactory));

		$PolygonFactory = FactoryProducer::getFactory('square');
		$this->assertTrue(is_object($PolygonFactory));
	}

	/**
	 * Verify that the objects created are of the correct instance
	 */
	public function testIsSpecifiedObject() {
		$FactoryObject = new FactoryProducer('circle');
		$this->assertTrue($FactoryObject instanceof AbstractFactoryTutorial\Factory\FactoryProducer);

		$CircleFactory = FactoryProducer::getFactory("CIRCLE");
		$this->assertTrue($CircleFactory instanceof AbstractFactoryTutorial\Factory\NonPolygonFactory);

		$RectangleFactory = FactoryProducer::getFactory("Rectangle");
		$this->assertTrue($RectangleFactory instanceof AbstractFactoryTutorial\Factory\PolygonFactory);

		$SquareFactory = FactoryProducer::getFactory("square");
		$this->assertTrue($SquareFactory instanceof AbstractFactoryTutorial\Factory\PolygonFactory);
	}

	/**
	 * Verify that the object variables/properties are being set correctly
	 */
	public function testObjectVariables() {
		$CircleFactory = FactoryProducer::getFactory("CIRCLE");
		$Circle = $CircleFactory->getShape();
		$Circle->setVariables($this->fixturePath);
		$this->assertEquals('CIRCLE', strtoupper($Circle->getName()));

		$RectangleFactory = FactoryProducer::getFactory("Rectangle");
		$Rectangle = $RectangleFactory->getShape();
		$Rectangle->setVariables($this->fixturePath);
		$this->assertEquals(true, $Rectangle->getOppositeSidesParallel());

		$SquareFactory = FactoryProducer::getFactory("square");
		$Square = $SquareFactory->getShape();
		$Square->setVariables($this->fixturePath);
		$this->assertEquals(true, $Square->getOppositeSidesParallel());
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
		$Producer = new FactoryProducer('not-a-shape');
	}
}