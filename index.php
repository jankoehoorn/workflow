<?php
	Namespace Car;

		Use Closure;

		Interface FuelTankerInterface {
			public function getFuel ( );
		}

		Interface EngineInterface {
			public function makeSound ( );
		}

		Interface CarInterface {

		}

		Interface CarServiceProviderInterface {

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

		Class CarServiceProvider Implements CarServiceProviderInterface {
			public static function register ( ) {
				IoC :: bind ( 'Engine', function ( $type ) {
					switch ($type) {
						case 'diesel':
							return new DieselEngine;
							break;
						case 'petrol':
							return new PetrolEngine;
							break;
						default:
							Throw new Exception ( 'Engine type must be diesel or petrol' );
							break;
					}

					return new Engine;
				} );

				IoC :: bind ( 'FuelTanker', function ( $type ) {
					switch ($type) {
						case 'diesel':
							return new DieselFuelTanker;
							break;
						case 'petrol':
							return new PetrolFuelTanker;
							break;
						default:
							Throw new Exception ( 'Fueltanker type must be diesel or petrol' );
							break;
					}

					return new FuelTanker;
				} );

				IoC :: bind ( 'Car', function ( $type ) {
					switch ($type) {
						case 'diesel':
							$engine = IoC :: make ( 'Engine', 'diesel' );
							$fueltanker = IoC :: make ( 'FuelTanker', 'diesel' );
							break;
						case 'petrol':
							$engine = IoC :: make ( 'Engine', 'petrol' );
							$fueltanker = IoC :: make ( 'FuelTanker', 'petrol' );
							break;
						default:
							Throw new Exception ( 'Car type must be diesel or petrol' );
							break;
					}

					$car = new Car;
					$car -> setEngine ( $engine );
					$car -> setFueltanker ( $fueltanker );

					return $car;
				} );
			}

		}

		Interface IoCInterface {
			public static function bind ( $name, Closure $Closure );
			public static function bound ( $name );
			public static function make ( $name, $id = false );
		}

		Class IoC Implements IoCInterface {
			protected static $registry = array ( );

			public static function bind ( $name, Closure $Closure ) {
				static :: $registry[ $name ] = $Closure;
			}

			public static function bound ( $name ) {
				return array_key_exists ( $name, static :: $registry );
			}

			public static function make ( $name, $id = false ) {
				if ( static :: bound ( $name ) ) {
					$name = static :: $registry[ $name ];
					return $name ( $id );
				}
				else {
					Throw new Exception ( 'Nothing bound to ' . $name );
				}
			}

		}

		try {
			CarServiceProvider :: register ( );

			$car = IoC :: make ( 'Car', 'diesel' );

			echo '<pre style="font: 12px Edlo; color: purple;">';
			$car -> getFuel ( );
			echo '</pre>';

			echo '<pre style="font: 12px Edlo; color: purple;">';
			$car -> drive ( );
			echo '</pre>';
		}
		catch (Exception $e) {
			echo '<pre style="font: 12px Edlo; color: purple;">';
			print_r ( $e );
			echo '</pre>';
		}
?>