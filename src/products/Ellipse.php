<?php 
namespace AbstractFactoryTutorial\Products;

/**
 * A Ellipse class that inherits from the Shape abstract class
 */
class Ellipse extends Shape {

	/**
	 * A boolean stating if the foci is in the same position
	 * @var bool
	 */
	protected $fociCoincide;

	/**
	 * An integer of the Ellipse's eccentricity - between 0 and 1
	 * @var int
	 */
	protected $eccentricity;

	/**
	 * Sets the available variables for Ellipse
	 * @param array $variables
	 * @return null
	 */
	public function setVariables(array $variables) {
		$this->name = 'Ellipse';
		$this->fociCoincide = $variables['ellipse']['fociCoincide'];
		$this->eccentricity = $variables['ellipse']['eccentricity'];
	}
}