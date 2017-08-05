<?php

use AbstractFactoryTutorial\Factory\AbstractFactory;
use AbstractFactoryTutorial\Factory\FactoryProducer;
use AbstractFactoryTutorial\Products;

class FactoryTest extends \PHPUnit_Framework_TestCase {

	public $circleFixture;
	public $rectangleFixture;
	public $triangleFixture;

	public function setUp() {
		$directory = dirname(realpath(dirname(__FILE__))) .'/tests/fixtures';
		$this->circleFixture = json_decode(file_get_contents($directory . DIRECTORY_SEPARATOR . 'circle.json'), TRUE);
		$this->rectangleFixture = json_decode(file_get_contents($directory . DIRECTORY_SEPARATOR . 'rectangle.json'), TRUE);
		$this->triangleFixture = json_decode(file_get_contents($directory . DIRECTORY_SEPARATOR . 'triangle.json'), TRUE);
	}

	/**
	 * Verify that each object is being instantiated correctly
	 */
	public function testIsObject() {
		$NonPolygonFactory = FactoryProducer::getFactoryForShape("circle");
		$this->assertTrue(is_object($NonPolygonFactory));

		$PolygonFactory = FactoryProducer::getFactoryForShape('square');
		$this->assertTrue(is_object($PolygonFactory));
	}

	/**
	 * Verify that the objects created are of the correct instance
	 */
	public function testIsSpecifiedObject() {
		$CircleFactory = FactoryProducer::getFactoryForShape("circle");
		$this->assertTrue($CircleFactory instanceof AbstractFactoryTutorial\Factory\NonPolygonFactory);

		$RectangleFactory = FactoryProducer::getFactoryForShape("Rectangle");
		$this->assertTrue($RectangleFactory instanceof AbstractFactoryTutorial\Factory\PolygonFactory);

		$SquareFactory = FactoryProducer::getFactoryForShape("square");
		$this->assertTrue($SquareFactory instanceof AbstractFactoryTutorial\Factory\PolygonFactory);
	}

	/**
	 * Verify that the object variables/properties are being set correctly
	 */
	public function testObjectVariables() {
		$CircleFactory = FactoryProducer::getFactoryForShape("circle");
		$CircleFactory->setPropertiesOfShape($this->circleFixture);
		$this->assertSame($this->circleFixture, $CircleFactory->getPropertiesOfShape());
		$Circle = $CircleFactory->getShape();
		$this->assertEquals('CIRCLE', strtoupper($Circle->getName()));
		$this->assertEquals(1, $Circle->getEccentricity());
		$this->assertEquals(25, $Circle->getDummyValue());

		$RectangleFactory = FactoryProducer::getFactoryForShape("Rectangle");
		$RectangleFactory->setPropertiesOfShape($this->rectangleFixture);
		$this->assertSame($this->rectangleFixture, $RectangleFactory->getPropertiesOfShape());
		$Rectangle = $RectangleFactory->getShape();
		$this->assertEquals(true, $Rectangle->getOppositeSidesParallel());

		$TriangleFactory = FactoryProducer::getFactoryForShape("triangle");
		$TriangleFactory->setPropertiesOfShape($this->triangleFixture);
		$this->assertSame($this->triangleFixture, $TriangleFactory->getPropertiesOfShape());
		$Triangle = $TriangleFactory->getShape();
		$this->assertEquals(3, $Triangle->getNumberOfAngles());
	}

	public function testGetFactoryForShape() {
		$Factory = FactoryProducer::getFactoryForShape('circle');
		$this->assertTrue($Factory instanceof AbstractFactoryTutorial\Factory\NonPolygonFactory);
	}
}