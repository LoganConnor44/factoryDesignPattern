<?php
namespace AbstractFactoryTutorial\Factory;

use AbstractFactoryTutorial\Products\Shape;
use AbstractFactoryTutorial\Products\Rectangle;
use AbstractFactoryTutorial\Products\Square;
use AbstractFactoryTutorial\Products\Triangle;

/**
 * A factory class which holds the logic for any Polygon shape objects that need to be created
 */
class PolygonFactory extends AbstractFactory {

	/**
	 * Calls the AbstractFactory constructor to verify that shape is valid and factory is 
	 * @param string $nameOfShape
	 * @return void
	 */
	public function __construct(string $nameOfShape) {
		parent::__construct($nameOfShape);
	}

	/**
	 * Sets the properties specific to the passed in shape
	 * @param array $shapeConfig
	 * @return void
	 */
	public function setPropertiesOfShape(array $shapeConfig) {
		$this->shapeProperties = $shapeConfig;
	}

	/**
	 * Returns an instantiated shape that was defined from the protected variable $this->shapeName
	 * @return Shape
	 */
	public function getShape() : Shape {
		switch ($this->shapeName) {
			case "rectangle" :
				return new Rectangle($this->shapeProperties);
			case "square" :
				return new Square($this->shapeProperties);
			case "triangle" :
				return new Triangle($this->shapeProperties);
		}
	}
}