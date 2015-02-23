<?php
	Namespace Car;

		Use Closure;
		Use Exception;

		Interface CarServiceProviderInterface {
			public static function register ( );
		}

		Class CarServiceProvider Implements CarServiceProviderInterface {
			public static function register ( ) {
				IoC :: bind ( 'Car', function ( $type ) {
					switch ($type) {
						case 'hybrid':
							return new HybridCar;
							break;
						case 'electric':
							$engine = IoC :: make ( 'Engine', 'electric' );
							$fueltanker = IoC :: make ( 'FuelTank', 'electric' );
							break;
						case 'diesel':
							$engine = IoC :: make ( 'Engine', 'diesel' );
							$fueltanker = IoC :: make ( 'FuelTank', 'diesel' );
							break;
						case 'petrol':
							$engine = IoC :: make ( 'Engine', 'petrol' );
							$fueltanker = IoC :: make ( 'FuelTank', 'petrol' );
							break;
						default:
							Throw new Exception ( 'Car type must be hybrid, electric, diesel or petrol' );
							break;
					}

					$car = new Car;
					$car -> setEngine ( $engine );
					$car -> setFuelTank ( $fueltanker );

					return $car;
				} );

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

				IoC :: bind ( 'FuelTank', function ( $type ) {
					switch ($type) {
						case 'electric':
							return new ElectricityFuelTank;
							break;
						case 'diesel':
							return new DieselFuelTank;
							break;
						case 'petrol':
							return new PetrolFuelTank;
							break;
						default:
							Throw new Exception ( 'Fueltanker type must be electric, diesel or petrol' );
							break;
					}

					return new FuelTank;
				} );

			}

		}
?>