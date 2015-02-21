<?php
	require_once 'models/car/serviceprovider.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>HTML</title>
		<meta name="description" content="" />
		<meta name="author" content="Jan" />

		<meta name="viewport" content="width=device-width; initial-scale=1.0" />

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
	</head>

	<body>
		<div>
			<header>
				<h1>HTML</h1>
			</header>
			<nav>
				<p>
					<a href="/">Home</a>
				</p>
				<p>
					<a href="/contact">Contact</a>
				</p>
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
	</body>
</html>
