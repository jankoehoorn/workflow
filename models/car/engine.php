<?php
	Namespace Car;

		Use Closure;

		Interface EngineInterface {
		}

		Abstract Class Engine Implements EngineInterface {
			private $fueltanker;
			
			public function setFuelTank ( FuelTankInterface $FuelTankInterface ) {
				$this -> fueltanker = $FuelTankInterface;
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