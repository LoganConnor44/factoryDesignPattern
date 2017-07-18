<?php
namespace AbstractFactoryTutorial\Factory;

use AbstractFactoryTutorial\Products\Shape;
use AbstractFactoryTutorial\Products\Rectangle;
use AbstractFactoryTutorial\Products\Square;

/**
 * A factory class which holds the logic for any Polygon Shape objects that need to be created
 */
class PolygonFactory extends AbstractFactory {

	/**
	 * Calls the AbstractFactory constructor to verify that shape is valid
	 * @param string $shape
	 * @return void
	 */
	public function __construct(string $shape) {
		parent::__construct($shape);
	}

	/**
	 * Returns an instantiated shape that was defined from the protected variable $this->shapeName
	 * @return Shape
	 */
	public function getShape() : Shape {
		switch ($this->shapeName) {
			case "RECTANGLE" :
				return new Rectangle();
			case "SQUARE" :
				return new Square();
			case "TRIANGLE" :
				return new Triangle();
		}
	}
}