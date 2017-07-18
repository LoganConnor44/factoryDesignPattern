<?php
namespace AbstractFactoryTutorial\Factory;

use AbstractFactoryTutorial\Products\Shape;
use AbstractFactoryTutorial\Products\Circle;

/**
 * A factory class which holds the logic for any NonPolygon Shape objects that need to be created
 */
class NonPolygonFactory extends AbstractFactory {
	public function __construct(string $shape) {
		parent::__construct($shape);
		$this->shapeName = $shape;
	}

	/**
	 * Returns an instantiated shape that was defined from the protected variable $this->shapeName
	 * @return Shape
	 */
	public function getShape() : Shape {
		switch ($this->shapeName) {
			case "CIRCLE" :
				return new Circle();
			case "ELLIPSE" :
				return new Ellipse();
			case "OVAL" :
				return new Oval();
		}
	}
}