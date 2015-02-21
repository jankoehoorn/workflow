<?php
	Namespace Car;

		Use Closure;

		Interface CarInterface {
			public function setEngine ( EngineInterface $engine );
			public function setFueltanker ( FuelTankerInterface $fueltanker );
			public function getFuel ( );
			public function drive ( );
		}

		Class Car Implements CarInterface {
			private $fueltanker;
			private $engine;
			public $brand;
			public $type;

			public function setEngine ( EngineInterface $EngineInterface ) {
				$this -> engine = $EngineInterface;
			}

			public function setFueltanker ( FuelTankerInterface $FuelTankerInterface ) {
				$this -> engine -> fueltanker = $FuelTankerInterface;
			}

			public function getFuel ( ) {
				echo $this -> engine -> fueltanker -> getFuel ( );
			}

			public function drive ( ) {
				echo $this -> engine -> makeSound ( );
			}

		}

		Class HybridCar {
			private $engines = array ( );

			public function setEngine ( EngineInterface $EngineInterface ) {
				$this -> engines[] = $EngineInterface;
			}

		}
?>