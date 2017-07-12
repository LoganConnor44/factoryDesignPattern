<?php 
namespace FactoryMethodPattern;

class ShapeFactory {
	public static function getShape(string $shapeType): Shape {
		if ($shapeType == null) {
			return null;
		}

		if (strtoupper($shapeType) === "CIRCLE") {
			return new Circle();
		} else if (strtoupper($shapeType) === "RECTANGLE") {
			return new Rectangle();
		} else if (strtoupper($shapeType) === "SQUARE") {
			return new Square();
		}

		return null;
	}
}