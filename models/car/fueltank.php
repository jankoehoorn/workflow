<?php
	Namespace Car;

		Use Closure;

		Interface FuelTankInterface {
			public function getFuel ( );
		}

		Class DieselFuelTank Implements FuelTankInterface {
			public function getFuel ( ) {
				return '<p>Tanking diesel...</p>';
			}

		}

		Class PetrolFuelTank Implements FuelTankInterface {
			public function getFuel ( ) {
				return '<p>Tanking petrol...</p>';
			}

		}

		Class LPGFuelTank Implements FuelTankInterface {
			public function getFuel ( ) {
				return '<p>Tanking LPG...</p>';
			}

		}

		Class ElectricityFuelTank Implements FuelTankInterface {
			public function getFuel ( ) {
				return '<p>Charging...</p>';
			}

		}
?>