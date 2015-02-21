<?php
	Namespace Car;

		Use Closure;

		Interface EngineInterface {
			public function makeSound ( );
		}

		Class DieselEngine Implements EngineInterface {
			public function makeSound ( ) {
				return 'Deep diesel sound';
			}

		}

		Class PetrolEngine Implements EngineInterface {
			public function makeSound ( ) {
				return 'High petrol sound';
			}

		}

		Class ElectricEngine Implements EngineInterface {
			public function makeSound ( ) {
				return 'Soft electric buzzing sound';
			}

		}
?>