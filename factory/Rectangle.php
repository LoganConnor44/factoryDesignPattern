<?php 
namespace FactoryMethodPattern;

class Rectangle extends Shape {
	public $vertices;
	public $oppositeSidesParallel;

	public function setVariables(array $variables) {
		$this->name = 'Rectangle';
		$this->vertices = $variables['rectangle']['vertices'];
		$this->oppositeSidesParallel = $variables['rectangle']['opposite_sides_parallel'];
	}

	public function getOppositeSidesParallel(): string {
		return $this->oppositeSidesParallel;
	}

	public function draw() {
		echo "Inside Rectangle::draw() method.";
	}
}