<?php
	Namespace Car;

		require 'models/ioc/ioc.php';
		require 'engine.php';
		require 'fueltank.php';
		require 'serviceprovider.php';
		
		// this should only show up in development branch

		Use Closure;

		Interface CarInterface {
			public function setEngine ( EngineInterface $engine );
			public function setFuelTank ( FuelTankInterface $fueltank );
			public function getFuel ( );
			public function drive ( );
		}

		Class Car Implements CarInterface {
			private $fueltank;
			private $engine;
			public $brand;
			public $type;

			public function setEngine ( EngineInterface $EngineInterface ) {
				$this -> engine = $EngineInterface;
			}

			public function setFuelTank ( FuelTankInterface $FuelTankInterface ) {
				$this -> engine -> fueltank = $FuelTankInterface;
			}

			public function getFuel ( ) {
				echo $this -> engine -> fueltank -> getFuel ( );
			}

			public function drive ( ) {
				echo $this -> engine -> makeSound ( );
			}

		}

		Class HybridCar {
			private $engines = array ( );

			public function setEngine ( EngineInterface $EngineInterface ) {
				$this -> engines[ ] = $EngineInterface;
			}

		}
?>