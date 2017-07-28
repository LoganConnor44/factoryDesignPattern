<?php 
namespace AbstractFactoryTutorial\Products;

/**
 * A Circle class that inherits from the Ellipse class
 */
class Circle extends Ellipse {

	/**
	 * A false value for showing that the dynamically defined variables work as expected
	 * @var int
	 */
	protected $dummyValue;

	/**
	 * Takes the configuration for a circle and passes it to the parent constructor
	 * @param array $config
	 */
	public function __construct(array $config) {
		parent::__construct($config);
	}

	/**
	 * Returns a protected variable
	 */
	public function getEccentricity() : int {
		return $this->eccentricity;
	}

	/**
	 * Returns a protected variable
	 */
	public function getDummyValue() : int {
		return $this->dummyValue;
	}
}