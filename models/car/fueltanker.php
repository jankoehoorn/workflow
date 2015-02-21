<?php
	Namespace Car;

		Use Closure;

		Interface FuelTankerInterface {
			public function getFuel ( );
		}

		Class DieselFuelTanker Implements FuelTankerInterface {
			public function getFuel ( ) {
				return 'Full tank of diesel';
			}

		}

		Class PetrolFuelTanker Implements FuelTankerInterface {
			public function getFuel ( ) {
				return 'Full tank of petrol';
			}

		}

		Class ElectricityFuelTanker Implements FuelTankerInterface {
			public function getFuel ( ) {
				return 'Batteries are fully charged';
			}

		}
?>