<?php 
namespace FactoryMethodPattern;

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