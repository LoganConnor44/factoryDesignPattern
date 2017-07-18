<?php 
namespace AbstractFactoryTutorial\Factory;

/**
 * Abstract class that all Factory classes will inherit from
 */
abstract class AbstractFactory {

	/**
	 * Name of the shape that will be produced
	 * @var string
	 */
	protected $shapeName;

	public function __construct(string $shape) {
		$shape = strtoupper($shape);
		try {
			$validShape = $this->isGivenShapeValid($shape);

			if (!$validShape) {
				throw new \Exception("Shape given does not have a corresponding class defined.");
			}
		} catch (Exception $e) {
			echo "Exception Caught: ", $e->getMessage(), "\n";
		}
	}

	/**
	 * Reads the file names in the factory directory and verifies that the $shapeType has a valid class written for it
	 * @param string $shapeType
	 * @return bool
	 */
	public static function isGivenShapeValid(string $shapeType): bool {
		$directory = dirname(realpath(dirname(__FILE__))) .'/products';
		//array_diff() removes the dots that this function picks up
		$availableShapeObjects = array_diff(scandir($directory), array('..', '.'));
		$shapeType = strtoupper($shapeType);

		foreach($availableShapeObjects as $index => &$shape) {
			$shape = strtoupper(strrev(substr(strrev($shape), 4)));
		}

		if (!in_array($shapeType, $availableShapeObjects)) {
			return FALSE;
		}
		return TRUE;
	}

	/**
	 * Reads the file names in the factories directory and verifies that the $factoryType has a valid class written for it
	 * @param string $factoryType
	 * @return bool
	 */
	public static function isGivenFactoryValid(string $factoryType): bool {
		$directory = dirname(realpath(dirname(__FILE__))) .'/factories';
		//array_diff() removes the dots that this function picks up
		$availableFactoryObjects = array_diff(scandir($directory), array('..', '.'));
		$factoryType = strtoupper($factoryType);

		foreach($availableFactoryObjects as $index => &$factory) {
			$factory = strtoupper(strrev(substr(strrev($factory), 4)));
		}

		if (!in_array($factoryType, $availableFactoryObjects)) {
			return FALSE;
		}
		return TRUE;
	}
}