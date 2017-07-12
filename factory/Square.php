<?php 
namespace FactoryMethodPattern;

class Square extends Shape {
	public $allSidesEqualLength;
	public $oppositeSidesParallel;

	public function setVariables(array $variables) {
		$this->name = 'Square';
		$this->allSidesEqualLength = $variables['square']['all_sides_equal_length'];
		$this->oppositeSidesParallel = $variables['square']['opposite_sides_parallel'];
	}

	public function getOppositeSidesParallel(): string {
		return $this->oppositeSidesParallel;
	}
}