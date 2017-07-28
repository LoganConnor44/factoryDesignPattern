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
	 * Calls the AbstractFactory constructor to verify that shape is valid
	 * @param array $config
	 * @return void
	 */
	public function __construct(array $config) {
		$nameOfShape = key($config);
		parent::__construct($nameOfShape);
		$this->shapeConfig = $config;
	}

	/**
	 * Returns an instantiated shape that was defined from the protected variable $this->shapeName
	 * @return Shape
	 */
	public function getShape() : Shape {
		switch ($this->shapeName) {
			case "rectangle" :
				return new Rectangle($this->shapeConfig);
			case "square" :
				return new Square($this->shapeConfig);
			case "triangle" :
				return new Triangle($this->shapeConfig);
		}
	}
}