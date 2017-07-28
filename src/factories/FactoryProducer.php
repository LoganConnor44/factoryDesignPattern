<?php 
namespace AbstractFactoryTutorial\Factory;

use AbstractFactoryTutorial\Factory\AbstractFactory;

/**
 * A factory class which holds the logic of which factory needs to be instaniated for the desired product
 */
class FactoryProducer extends AbstractFactory {

	/**
	 * Takes in a $shapeType and if it is an expected type is will return the appropriate factory object
	 * 
	 * When $typeAvailable is being defined we are substracting 1 from $numberOfKey because we need to account for zero-indexing
	 * @param string $shapeType
	 * @throws Exception
	 */
	public static function getFactory(string $shapeType) : AbstractFactory {
		try {
			$shapeDefinitions = AbstractFactory::getDefinitions();
			$validShape = AbstractFactory::isGivenShapeValid($shapeType);
			$expectedFactory = AbstractFactory::getExpectedFactoryFromShape($shapeType);
			$validFactory = AbstractFactory::isGivenFactoryValid($expectedFactory);

			if (!$validShape && !$validFactory) {
				throw new \Exception("Shape given does not have a corresponding class defined.");
			}
		} catch (Exception $e) {
			echo "Exception Caught: ", $e->getMessage(), "\n";
		}
		$availableTypes = array_keys($shapeDefinitions);
		$numberOfKeys = count($availableTypes);
		while ($numberOfKeys > 0) {
			$typeAvailable = $availableTypes[$numberOfKeys - 1];
			
			$shapeType = strtolower($shapeType);
			if (array_key_exists($shapeType, $shapeDefinitions[$typeAvailable])) {
				$shapeConfig = array(
					$shapeType => $shapeDefinitions[$typeAvailable][$shapeType]
				);
				$factoryClass = 'AbstractFactoryTutorial\\Factory\\' . $typeAvailable . 'Factory';
				return new $factoryClass($shapeConfig);
			}
			$numberOfKeys--;
		}
	}
}