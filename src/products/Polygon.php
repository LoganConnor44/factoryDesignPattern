<?php 
namespace AbstractFactoryTutorial\Products;

/**
 * Super class that all Polygons will inherit from.
 */
abstract class Polygon extends Shape {
	/**
	 * A boolean value if all sides are of equal length
	 * @var bool
	 */
	protected $allSidesEqualLength;

	/**
	 * A boolean value if the opposite sides are parallel
	 * @var bool
	 */
	protected $oppositeSidesParallel;

	/**
	 * An integer value of how many vertices a Polygon has
	 * @var int
	 */
	protected $vertices;

	/**
	 * Takes in the configuration, passes the shape name to the object variable $nameOfShape, passes that $nameOfShape to the parent constructor, and sets necessary variables for the intended shape 
	 * @param array $config
	 */
	public function __construct(array $config) {
		$nameOfShape = key($config);
		parent::__construct($nameOfShape);
		$this->allSidesEqualLength = $config[$this->name]['allSidesEqualLength'];
		$this->oppositeSidesParallel = $config[$this->name]['oppositeSidesParallel'];
		$this->vertices = $config[$this->name]['vertices'];
	}

	/**
	 * Returns the protected variable $name
	 * @return bool
	 */
	public function getOppositeSidesParallel(): bool {
		return $this->oppositeSidesParallel;
	}
}