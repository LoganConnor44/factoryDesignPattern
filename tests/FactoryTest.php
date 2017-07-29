<?php

use AbstractFactoryTutorial\Factory\AbstractFactory;
use AbstractFactoryTutorial\Factory\FactoryProducer;

class FactoryTest extends \PHPUnit_Framework_TestCase {

	/**
	 * Verify that each object is being instantiated correctly
	 */
	public function testIsObject() {
		$NonPolygonFactory = FactoryProducer::getFactory("circle");
		$this->assertTrue(is_object($NonPolygonFactory));

		$PolygonFactory = FactoryProducer::getFactory('square');
		$this->assertTrue(is_object($PolygonFactory));
	}

	/**
	 * Verify that the objects created are of the correct instance
	 */
	public function testIsSpecifiedObject() {
		$CircleFactory = FactoryProducer::getFactory("circle");
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
		$this->assertEquals('CIRCLE', strtoupper($Circle->getName()));
		$this->assertEquals(1, $Circle->getEccentricity());
		$this->assertEquals(25, $Circle->getDummyValue());

		$RectangleFactory = FactoryProducer::getFactory("Rectangle");
		$Rectangle = $RectangleFactory->getShape();
		$this->assertEquals(true, $Rectangle->getOppositeSidesParallel());

		//square class not yet defined
		// $SquareFactory = FactoryProducer::getFactory("square");
		// $Square = $SquareFactory->getShape();
		// $this->assertEquals(true, $Square->getOppositeSidesParallel());

		$TriangleFactory = FactoryProducer::getFactory("triangle");
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
		$RectangleFactory = FactoryProducer::getFactory("not-a-shape");
	}
}