<?php 
namespace AbstractFactoryTutorial\Factory;

use AbstractFactoryTutorial\Product;

/**
 * The top most parent Abstract class for all factory classes
 */
abstract class AbstractFactory {

	/**
	 * Name of the shape that will be produced
	 * @var string
	 */
	protected $shapeName;

	/**
	 * The properties of the shape to be created
	 * @var array
	 */
	protected $shapeProperties;

	/**
	 * This constructor is called when a specific shape factory is instantiated and sets the protected $shapeName if it is a valid shape
	 * @param string $shape
	 * @return void
	 */
	public function __construct(string $shape) {
		$this->shapeName = $shape;
	}

	/**
	 * An abstract function for children classes to define. This will always take in an array for the configuration of a shape
	 * @internal php can not define return types within an abstract method
	 * @param array $shapeConfig
	 */
	abstract protected function setPropertiesOfShape(array $shapeConfig);

	/**
	 * An abstract function for children classes to define
	 * @internal php can not define return types within an abstract method
	 */
	abstract protected function getShape();

	/**
	 * Returns the protected property of $shapeProperties
	 * @return array
	 */
	public function getPropertiesOfShape() : array {
		return $this->shapeProperties;
	}
}