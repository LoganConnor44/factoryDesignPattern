<?php 
namespace AbstractFactoryTutorial\Products;

/**
 * Super class that all shapes will inherit from.
 */
abstract class Shape {
	
	/**
	 * Name of the given shape
	 * @var string
	 */
	protected $name;

	/**
	 * Takes in the name of the intended shape and sets it to the object variable $name
	 * @param string $nameOfShape
	 */
	public function __construct(string $nameOfShape) {
		$this->name = $nameOfShape;
	}

	/**
	 * Recursively goes through an array and if a variable is undefined it dynamically defines it based on the passed $config $value
	 * @param array $config
	 */
	public function setVariables(array $config) {
		array_walk_recursive($config, function($value, $key) {
			if (empty($this->$key)) {
				$this->$key = $value;
			}
		} );
	}

	/**
	 * Returns the protected variable $name
	 * @return string $name
	 */
	public function getName(): string {
		return $this->name;
	}

	/**
	 * Prints a string of text to the terminal
	 * @return null
	 */
	public function draw() {
		print "Use your imagination that a " . $this->name . " was drawn on the screen.";
	}
}