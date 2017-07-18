<?php 
namespace AbstractFactoryTutorial\Factory;

use AbstractFactoryTutorial\Factory\AbstractFactory;

/**
 * A factory class which holds the logic of which 'product' (or specific shape) to return
 */
class FactoryProducer extends AbstractFactory {

	public function __construct(string $shape) {
		parent::__construct($shape);
		$this->shapeName = $shape;
	}

	/**
	 * Takes in a $shapeType and if it is an expected type is will return the appropriate object
	 * @param string $shapeType
	 * @return object Shape | null 
	 */
	public static function getFactory(string $shapeType) : AbstractFactory {
		$nonPolygons = array(
			'CIRCLE',
			'OVAL',
			'ELLIPSE'
		);
		$polygons = array(
			'RECTANGLE',
			'SQUARE',
			'TRIANGLE'
		);
		
		$shapeType = strtoupper($shapeType);
		if (in_array($shapeType, $nonPolygons)) {
			return new NonPolygonFactory($shapeType);
		}
		if (in_array($shapeType, $polygons)) {
			return new PolygonFactory($shapeType);
		}
	}
}