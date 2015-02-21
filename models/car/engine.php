<?php
	Namespace Car;

		Use Closure;

		Interface EngineInterface {
		}

		Abstract Class Engine Implements EngineInterface {
			private $fueltanker;
			
			public function setFuelTanker ( FuelTankerInterface $FuelTankerInterface ) {
				$this -> fueltanker = $FuelTankerInterface;
			}

		}

		Class DieselEngine Extends Engine {
			public function makeSound ( ) {
				return 'Deep diesel sound';
			}

		}

		Class PetrolEngine Extends Engine {
			public function makeSound ( ) {
				return 'High petrol sound';
			}

		}

		Class ElectricEngine Extends Engine {
			public function makeSound ( ) {
				return 'Soft electric buzzing sound';
			}

		}
?>