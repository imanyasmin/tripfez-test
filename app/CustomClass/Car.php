<?php

namespace app\CustomClass;

class Car {

	public static function getCar() {

		$car = 
		[
			'bmw' => 'BMW', 
			'proton' => 'Proton'
		];
		$color = 
		[					
			'black' => 'Black', 
			'white' => 'White',
			'red' => 'Red',
			'silver' => 'Silver'
		];

		$this->getCar = SpecialCar($car,$color);

	}

	public static function SpecialCar() {

		$specialCar = $this->getCar;

		$brand =
		[
			'inspira' => 'Inspira', 
			'persona' => 'Persona',
			'perdana' => 'Perdana',
			'saga' => 'Saga'
			
		];
	}

	public static function setCar() {

		return $car[1].$color[0].$brand[0];
	}
}







