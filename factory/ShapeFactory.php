<?php 
namespace FactoryMethodPattern;

/**
 * A factory class which holds the logic of which 'product' (or specific shape) to return
 */
class ShapeFactory {

	/**
	 * Takes in a $shapeType and if it is an expected type is will return the appropriate object
	 * @param string $shapeType
	 * @return object Shape | null 
	 */
	public static function getShape(string $shapeType): Shape {
		try {
			$validShape = ShapeFactory::isGivenShapeValid($shapeType);

			if (!$validShape) {
				throw new \Exception("Shape given does not have a corresponding class defined.");
			}
		} catch (Exception $e) {
			echo "Exception Caught: ", $e->getMessage(), "\n";
		}
		
		$shapeType = strtoupper($shapeType);
		if ($shapeType === "CIRCLE") {
			return new Circle();
		} else if ($shapeType === "RECTANGLE") {
			return new Rectangle();
		} else if ($shapeType === "SQUARE") {
			return new Square();
		}
	}

	/**
	 * Reads the file names in the factory directory and verifies that the $shapeType has a valid class written for it
	 * @param string $shapeType
	 * @return bool
	 */
	public static function isGivenShapeValid(string $shapeType): bool {
		$directory = dirname(realpath(dirname(__FILE__))) .'/factory';
		//array_diff() removes the dots that this function picks up
		$availableShapeObjects = array_diff(scandir($directory), array('..', '.'));
		$shapeType = strtoupper($shapeType);

		foreach($availableShapeObjects as $index => &$shape) {
			$shape = strtoupper(strrev(substr(strrev($shape), 4)));
			if($shape === 'ShapeFactory') {
				unset($availableShapeObjects[$index]);
			}
		}

		if (!in_array($shapeType, $availableShapeObjects)) {
			return FALSE;
		}
		return TRUE;
	}
}