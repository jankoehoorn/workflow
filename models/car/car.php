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

			public function setEngine ( EngineInterface $engine ) {
				$this -> engine = $engine;
			}

			public function setFueltanker ( FuelTankerInterface $fueltanker ) {
				$this -> fueltanker = $fueltanker;
			}

			public function getFuel ( ) {
				echo $this -> fueltanker -> getFuel ( );
			}

			public function drive ( ) {
				echo $this -> engine -> makeSound ( );
			}

		}
?>