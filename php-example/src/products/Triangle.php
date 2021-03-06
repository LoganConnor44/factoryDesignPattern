<?php 
namespace AbstractFactoryTutorial\Products;

/**
 * A Triangle class that inherits from the Shape abstract class
 */
class Triangle extends Polygon {

	/**
	 * An integer value for the number of angles a shape has
	 * @var int
	 */
	protected $angles;

	/**
	 * An integer value for the number of edges a shape has
	 * @var int
	 */
	protected $edges;

	/**
	 * Takes the configuration for a triangle and passes it to the parent constructor
	 * @param array $config
	 */
	public function __construct(array $config) {
		parent::__construct($config);
		$this->angles = $config[$this->name]['angles'];
		$this->edges = $config[$this->name]['edges'];
	}

	/**
	 * Returns a protected variable
	 */
	public function getNumberOfAngles() : int {
		return $this->angles;
	}
}