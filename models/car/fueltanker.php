<?php
	Namespace Car;

		Use Closure;

		Interface FuelTankerInterface {
			public function getFuel ( );
		}

		Class DieselFuelTanker Implements FuelTankerInterface {
			public function getFuel ( ) {
				return '<p>Tanking... tank is full of diesel</p>';
			}

		}

		Class PetrolFuelTanker Implements FuelTankerInterface {
			public function getFuel ( ) {
				return '<p>Tanking... tank is full of petrol</p>';
			}

		}

		Class ElectricityFuelTanker Implements FuelTankerInterface {
			public function getFuel ( ) {
				return '<p>Charging... batteries are fully charged</p>';
			}

		}
?>