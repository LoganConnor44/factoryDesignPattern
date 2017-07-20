<?php 
namespace AbstractFactoryTutorial\Products;

/**
 * A Circle class that inherits from the Ellipse class
 */
class Circle extends Ellipse {

	/**
	 * Sets the available variables for Circle
	 * @param array $variables
	 * @return null
	 */
	public function setVariables(array $variables) {
		$this->name = 'Circle';
		$this->fociCoincide = $variables['circle']['fociCoincide'];
		$this->eccentricity = $variables['circle']['eccentricity'];
	}
}