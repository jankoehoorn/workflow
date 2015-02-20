<?php
	Namespace Car;
	
	Use Closure;
	
		error_reporting ( E_ALL | E_STRICT );
		ini_set ( 'display_errors', true );

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

			public function drive ( ) {

			}

		}

		Class CarServiceProvider Implements CarServiceProviderInterface {
			public static function register ( ) {
				IoC :: bind ( 'FuelTanker', function ( ) {
					return new FuelTanker;
				} );
				IoC :: bind ( 'Engine', function ( $type ) {
					switch ($type) {
						case 'diesel':
							return new DieselEngine;
							break;
						case 'petro':
							return new PetrolEngine;
							break;
						default:
							Throw new Exception ( 'Engine type must be diesel or petrol' );
							break;
					}

					return new Engine;
				} );
				IoC :: bind ( 'Car', function ( ) {
					return new Car;
				} );
				IoC :: bind ( 'FuelTanker', function ( ) {
					return new FuelTanker;
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

			$car = IoC :: make ( 'Car' );

			echo '<pre style="font: 12px Edlo; color: purple;">';
			print_r ( $car );
			echo '</pre>';
		}
		catch (Exception $e) {
			echo '<pre style="font: 12px Edlo; color: purple;">';
			print_r ( $e );
			echo '</pre>';
		}
?>