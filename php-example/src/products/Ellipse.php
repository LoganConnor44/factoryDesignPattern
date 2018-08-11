<?php 
namespace AbstractFactoryTutorial\Products;

/**
 * A Ellipse class that inherits from the Shape abstract class
 */
class Ellipse extends NonPolygon {

	/**
	 * Takes the configuration for a ellipse (or potential children) and passes it to the parent constructor
	 * @param array $config
	 */
	public function __construct(array $config) {
		parent::__construct($config);
	}
}