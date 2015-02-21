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

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
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
			<nav>
			</nav>

			<div>
				<section id="car">
					<?php
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
				</section>
			</div>

			<footer></footer>
		</div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	</body>
</html>
