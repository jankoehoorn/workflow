<?php
	Namespace Car;

		Use Closure;

		Interface CarServiceProviderInterface {
			public static function register ( );
		}

		Class CarServiceProvider Implements CarServiceProviderInterface {
			public static function register ( ) {
				IoC :: bind ( 'Engine', function ( $type ) {
					switch ($type) {
						case 'electric':
							return new ElectricEngine;
							break;
						case 'diesel':
							return new DieselEngine;
							break;
						case 'petrol':
							return new PetrolEngine;
							break;
						default:
							Throw new Exception ( 'Engine type must be electric, diesel or petrol' );
							break;
					}

					return new Engine;
				} );

				IoC :: bind ( 'FuelTanker', function ( $type ) {
					switch ($type) {
						case 'electric':
							return new ElectricFuelTanker;
							break;
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
?>