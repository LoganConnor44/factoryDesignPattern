<?php
use FactoryMethodPattern\ShapeFactory;

class FactoryTest extends \PHPUnit_Framework_TestCase {
	protected $fixturePath;

	public function setUp() {
		$this->fixturePath = json_decode(file_get_contents(dirname(realpath(dirname(__FILE__))) . '/definitions/shapes.json'), TRUE);
	}

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

	public function testIsSpecifiedObject() {
		$FactoryObject = new ShapeFactory();
		$this->assertTrue($FactoryObject instanceof ShapeFactory);

		$Circle = ShapeFactory::getShape("CIRCLE");
		$this->assertTrue($Circle instanceof FactoryMethodPattern\Circle);

		$Rectangle = ShapeFactory::getShape("Rectangle");
		$this->assertTrue($Rectangle instanceof FactoryMethodPattern\Rectangle);

		$Square = ShapeFactory::getShape("square");
		$this->assertTrue($Square instanceof FactoryMethodPattern\Square);
	}

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
}