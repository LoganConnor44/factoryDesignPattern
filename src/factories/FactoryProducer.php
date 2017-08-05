<?php 
namespace AbstractFactoryTutorial\Factory;

use AbstractFactoryTutorial\Factory\AbstractFactory;

/**
 * A factory class which holds the logic of which factory needs to be instaniated for the desired product
 */
class FactoryProducer {

	/**
	 * Reads then returns the definitions file that is stored locally
	 * @return array
	 */
	public static function getDefinitions() : array {
		$directory = dirname(realpath(dirname(__FILE__))) .'/definitions';
		$definitions = json_decode(file_get_contents($directory . DIRECTORY_SEPARATOR . 'factories.json'), TRUE);
		return $definitions;
	}

	/**
	 * Takes in a $shapeType and will return the appropriate factory object
	 * 
	 * When $typeAvailable is being defined we are substracting 1 from $numberOfKey because we need to account for zero-indexing
	 * @param string $shapeType
	 * @return object AbstractFactory
	 */
	public static function getFactoryForShape(string $shapeType) : AbstractFactory {
		$shapeDefinitions = FactoryProducer::getDefinitions();
		$availableFactories = array_keys($shapeDefinitions);
		$numberOfFactories = count($availableFactories);
		while ($numberOfFactories > 0) {
			$currentFactory = $availableFactories[$numberOfFactories - 1];
			$shapeType = strtolower($shapeType);
			$indexWithinFactory = array_search($shapeType, $shapeDefinitions[$currentFactory]);
			if ($indexWithinFactory !== FALSE) {
				$factoryClass = 'AbstractFactoryTutorial\\Factory\\' . $currentFactory . 'Factory';
				return new $factoryClass($shapeType);
			}
			$numberOfFactories--;
		}
		return NULL;
	}

}