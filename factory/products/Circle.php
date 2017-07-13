<?php 
namespace Factory\Products;

/**
 * A Circle class that inherits from the Shape abstract class
 */
class Circle extends Shape {

	/**
	 * An integer of the Circle's circumference
	 * @var int
	 */
	protected $circumference;

	/**
	 * An integer of the Circle's radius
	 * @var int
	 */
	protected $radius;

	/**
	 * Sets the available variables for Circle
	 * @param array $variables
	 * @return null
	 */
	public function setVariables(array $variables) {
		$this->name = 'Circle';
		$this->circumference = $variables['circle']['circumference'];
		$this->radius = $variables['circle']['radius'];
	}
}