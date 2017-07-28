<?php 
namespace AbstractFactoryTutorial\Factory;

/**
 * The top most parent Abstract class for all factory classes
 */
abstract class AbstractFactory {

	/**
	 * The locally stored definitions data for all available shapes
	 * @var array
	 */
	protected $shapeDefinitions;

	/**
	 * Name of the shape that will be produced
	 * @var string
	 */
	protected $shapeName;

	/**
	 * The configurations of the shape to be created
	 * @var array
	 */
	protected $shapeConfig;

	/**
	 * This constructor is called when a specific shape factory is instantiated and sets the protected $shapeName if it is a valid shape
	 * @param string $shape
	 * @return void
	 */
	public function __construct(string $shape) {
		$shape = strtolower($shape);
		$this->shapeName = $shape;
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
		$shapeType = strtolower($shapeType);

		foreach($availableShapeObjects as $index => &$shape) {
			$shape = strtolower(strrev(substr(strrev($shape), 4)));
		}

		if (!in_array($shapeType, $availableShapeObjects)) {
			return FALSE;
		}
		return TRUE;
	}

	/**
	 * Reads the definitions file that is stored locally and searches for the key (factory name) that is associated with an individual shape
	 * @param string $shape
	 * @return string
	 */
	public static function getExpectedFactoryFromShape(string $shape) : string {
		$directory = dirname(realpath(dirname(__FILE__))) .'/definitions';
		$definitions = json_decode(file_get_contents($directory . DIRECTORY_SEPARATOR . 'shapes.json'), TRUE);
		return array_search($shape, $definitions);
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
		$factoryType = strtolower($factoryType);

		foreach($availableFactoryObjects as $index => &$factory) {
			$factory = strtolower(strrev(substr(strrev($factory), 4)));
		}

		if (!in_array($factoryType, $availableFactoryObjects)) {
			return FALSE;
		}
		return TRUE;
	}
}