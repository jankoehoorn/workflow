<?php
	require_once 'elements/debug.php';
	require_once 'kint/Kint.class.php';
	require_once 'models/ioc/ioc.php';
	require_once 'models/car/car.php';
	require_once 'models/car/engine.php';
	require_once 'models/car/fueltanker.php';
	require_once 'models/car/serviceprovider.php';

	Use Car\CarServiceProvider;
	Use Car\IoC;
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="description" content="" />
		<meta name="author" content="Jan" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0" />

		<title>GitHub Workflow Casestudy</title>

		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />

		<link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/stylesheet.css" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,700,700italic,300,300italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,700,700italic,400italic' rel='stylesheet' type='text/css'>

	</head>

	<body>
		<div id="container">
			<header>
				<h1>GitHub Workflow Casestudy</h1>
			</header>
			<nav></nav>

			<div>
				<section id="car">
					<?php
						try {
							CarServiceProvider :: register ( );

							$CarDiesel = IoC :: make ( 'Car', 'diesel' );
							$CarPetrol = IoC :: make ( 'Car', 'petrol' );
							$CarElectric = IoC :: make ( 'Car', 'electric' );
							$CarHybrid = IoC :: make ( 'Car', 'hybrid' );

							$EnginePetrol = IoC :: make ( 'Engine', 'petrol' );
							$EnginePetrol -> setFuelTanker ( IoC :: make ( 'FuelTanker', 'petrol' ) );
							$CarHybrid -> setEngine ( $EnginePetrol );
							$EngineElectric = IoC :: make ( 'Engine', 'electric' );
							$EngineElectric -> setFuelTanker ( IoC :: make ( 'FuelTanker', 'electric' ) );
							$CarHybrid -> setEngine ( $EngineElectric );

							s ( $CarHybrid );

							echo '<pre>';
							$CarDiesel -> getFuel ( );
							$CarDiesel -> drive ( );
							echo '</pre>';

							echo '<pre>';
							$CarPetrol -> getFuel ( );
							$CarPetrol -> drive ( );
							echo '</pre>';

							echo '<pre>';
							$CarElectric -> getFuel ( );
							$CarElectric -> drive ( );
							echo '</pre>';
						}
						catch (Exception $e) {
							echo '<pre>';
							print_r ( $e );
							echo '</pre>';
						}
					?>
				</section>
			</div>

			<footer></footer>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	</body>
</html>
