<?php

function get_page() {

?>
<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=640">
		<title></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/normalize.min.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/fonts/style.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/vendor/modernizr-2.8.3.min.js"></script>
		<script src="http://code.createjs.com/easeljs-0.8.1.min.js"></script>
	    <script src="http://code.createjs.com/tweenjs-0.6.1.min.js"></script>
	    <script src="http://code.createjs.com/movieclip-0.8.1.min.js"></script>
	    <script src="http://code.createjs.com/preloadjs-0.6.1.min.js"></script>
	    <script src="animation/canvas.assets.js"></script>
	    <script src="animation/main.js"></script>
	</head>
	<body class="home_bg" onload="init();">
		<div class="home container">
			<div id="download">
				<img src="img/background3.png" class="display">

				<div class="hours">
					<label class="custom-select">
						<select id="cboHours">
							<option value="900">9:00 AM</option>
							<option value="930">9:30 AM</option>
							<option value="1000">10:00 AM</option>
							<option value="1030">10:30 AM</option>
							<option value="1100">11:00 AM</option>
							<option value="1130">11:30 AM</option>
							<option value="1200">12:00 PM</option>
							<option value="1230">12:30 PM</option>
							<option value="1300">1:00 PM</option>
							<option value="1330">1:30 PM</option>
							<option value="1400">2:00 PM</option>
							<option value="1430">2:30 PM</option>
							<option value="1500">3:00 PM</option>
							<option value="1530">3:30 PM</option>
							<option value="1600">4:00 PM</option>
							<option value="1630">4:30 PM</option>
							<option value="1700">5:00 PM</option>
							<option value="1730">5:30 PM</option>
							<option value="1800">6:00 PM</option>
							<option value="1830">6:30 PM</option>
							<option value="1900">7:00 PM</option>
							<option value="1930">7:30 PM</option>
							<option value="2000">8:00 PM</option>
							<option value="2030">8:30 PM</option>
							<option value="2100">9:00 PM</option>
							<option value="2130">9:30 PM</option>
							<option value="2200">10:00 PM</option>
							<option value="2230">10:30 PM</option>
							<option value="2300">11:00 PM</option>
							<option value="2330">11:30 PM</option>
						</select>
					</label>
				</div>

				<div class="add_button">
					<a href="<?php echo $GLOBALS["url"]; ?>get/0900" id="btnAddCalendar">
						<img src="img/btn_add_calendar.png">
					</a>
				</div>

				<div class="no_thanks">
					<a href="#" onclick="handleOverlayClosed(); document.getElementById('download').style.display='none';">No gracias, lo descargaré más tarde</a>
				</div>
			</div>
			<script>
				// Handles when first part of the intro has ended and the overlay needs to be shown
				document.addEventListener('intro-ended', function(){
					console.log('Mostrando el Overlay');
					document.getElementById('download').style.display = "block";
				});
				// Handles when the user finishes dragging and the animation has been completed, hides the canvas.
				document.addEventListener('drag-ended', function(){
					console.log('Finalizado, quitando el canvas');
					document.getElementById('canvas-intro').style.display = "none";
				});
			</script>
			
			<div id="canvas-intro">
			    <canvas id="canvas" width="640" height="1028"></canvas>
			</div>
		</div>
		

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
		<script type="text/javascript">var url="<?php echo $GLOBALS['url']; ?>";</script>
		<script src="js/main.js"></script>
	</body>
</html>

	<?php
}



function get_day($day) {
?>
<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="css/normalize.min.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/fonts/style.css">
		<link rel="stylesheet" href="css/style.css">

		<script src="js/vendor/modernizr-2.8.3.min.js"></script>
	</head>
	<body class="day_bg">

		

		<?php 
			include("days/day_".$day.".php"); 
		?>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

		<script src="js/main.js"></script>
	</body>
</html>
	<?php
}



function get_calendar($hour) {

	require_once("calendar.php");

    

    
	$title = array(
		"Un lindo detalle para tus fiestas.",
		"Una deliciosa receta para tus leftovers.",
		"Dale un toque mágico a tu decoración.",
		"Tecnología que te pone a bailar.",
		"¡Un intercambio que todos recordarán!",
		"Esparce la magia con este lindo detalle.",
		"Sin música, ¡no hay fiesta!",
		"¡Una dulce receta para los tuyos!",
		"Te mereces unas fiestas sin estrés.",
		"¡¿Alguien dijo HOLIDAY CHURROS?!",
		"¡Súbele el volumen a tus fiestas!",
		"Crea candelabros por arte de magia.");

	

	$description = array(
		"Abre la magia haciendo clic en el enlace. Pista: A todos nos encantan las cosas gratis.",
		"Abre la magia haciendo clic en el enlace. Pista: 3 maneras de disfrutar el pavito que sobró.",
		"Abre la magia haciendo clic en el enlace. Pista: Algo divertido para hacer con los niños.",
		"Abre la magia haciendo clic en el enlace. Pista: Calcula cuántos pasos diste en la pista de baile.",
		"Abre la magia haciendo clic en el enlace. Pista: Una manera divertida de hacer el tradicional intercambio de regalos.",
		"Abre la magia haciendo clic en el enlace. Pista: La época se hace alegre con estas decoraciones.",
		"Abre la magia haciendo clic en el enlace. Pista: Un accesorio de música que sigue tu ritmo.",
		"Abre la magia haciendo clic en el enlace. Pista: Disfrútalo durante un día lluvioso bajo las cobijas.",
		"Abre la magia haciendo clic en el enlace. Pista: Menos OOPS. ¡Más WEPA!",
		"Abre la magia haciendo clic en el enlace. Pista: Un postre clásico con un dulce twist.",
		"Abre la magia haciendo clic en el enlace. Pista: Sonido tan real que creerás que te están dando posadas.",
		"Abre la magia haciendo clic en el enlace. Pista: Ilumina tus fiestas con este truco sencillo.");

	$startDate = '20151212';

	$start = DateTime::createFromFormat("Ymd", $startDate, new DateTimeZone("UTC"));
	$today = DateTime::createFromFormat("Ymd", date('Ymd'), new DateTimeZone('UTC')); 
	$today->add(new DateInterval('P1D'));


	$diffdays = 0;
	
	if ($today > $start) {
		$days = $start->diff($today);
		$diffdays = $days->days;
	}

	$totaldays = 12 - $diffdays;

	$time = $_GET['tz'];
	$tz = $time * (-100);

	$hour = $hour + $tz;

	download($startDate,$totaldays,$hour,$title,$description);
}
?>