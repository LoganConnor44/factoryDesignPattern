<?php
namespace AbstractFactoryTutorial\Factory;

use AbstractFactoryTutorial\Products\Shape;
use AbstractFactoryTutorial\Products\Ellipse;
use AbstractFactoryTutorial\Products\Circle;

/**
 * A factory class which holds the logic for any NonPolygon shape objects that need to be created
 */
class NonPolygonFactory extends AbstractFactory {

	/**
	 * Calls the AbstractFactory constructor to verify that shape is valid and factory is 
	 * @param string $config
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
			case "circle" :
				return new Circle($this->shapeConfig);
			case "ellipse" :
				return new Ellipse($this->shapeConfig);
			case "oval" :
				return new Oval($this->shapeConfig);
		}
	}
}