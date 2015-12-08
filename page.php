<?php

function get_page() {

?>
<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=640">
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
	<body class="day_bg" onload="init();">
		<?php include("intro.php"); ?>

		<?php 
		$startDate = $GLOBALS["startDate"];
		$endDate = $GLOBALS["endDate"];

		$day = date("j");
		$month = date("n");
		$startDay = date("j", strtotime($startDate));
		$endDay = date("j", strtotime($endDate));

		if ($month == 12) {
			if ($day <= $startDay) {
				$day = 1;
			} else {
				if ($day >= $endDay) {
					$day = $GLOBALS["totalDays"];
				} else {
					$day = $day - ($GLOBALS["totalDays"] - 1);
				}
			}
		} else {
			$day = $endDay;
		}

		?>	
		<div class="days">
			<?php include("days/day_".$day.".php"); ?>
		</div>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
		<script type="text/javascript">var url="<?php echo $GLOBALS['url']; ?>";</script>
		<script src="js/vendor/jquery.jscroll.min.js"></script>
		<script src="js/vendor/jquery.cookie.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>

	<?php
}



function get_day($day) {
?>
<!DOCTYPE html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title></title>
		<meta name="description" content="">
		
		<meta name="viewport" content="width=640">

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
	<body class="day_bg" onload="init();">
		<?php include("intro.php"); ?>

		<div class="days">
		<?php 

			/* AJAX check  */
			if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
				
				$quit_scroll = false;
				include("days/day_".$day.".php"); 	
			}
			else{

				for ($i=1; $i < $day; $i++) { 
					global $quit_scroll;
					$quit_scroll = true;
					include("days/day_".$i.".php");	
				}

				$quit_scroll = false;
				include("days/day_".$day.".php"); 	
			}
			
		?>
		</div>

		

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
		<script src="js/vendor/jquery.jscroll.min.js"></script>
		<script src="js/vendor/jquery.cookie.js"></script>
		<script src="js/main.js"></script>
		<script type="text/javascript">
			
		</script>
	</body>
</html>
	<?php
}



function get_calendar($hour) {

	require_once("calendar.php");

    
	$title = array(
		/*  1 */ "Un lindo detalle para tus fiestas.", /* 1 */
		/*  2 */ "Una deliciosa receta para tus leftovers.",
		/*  3 */ "Dale un toque mágico a tu decoración.",
		/*  4 */ "Tecnología que te pone a bailar.",
		/*  5 */ "¡Un intercambio que todos recordarán!",
		/*  6 */ "Esparce la magia con este lindo detalle.",
		/*  7 */ "Sin música, ¡no hay fiesta!",
		/*  8 */ "¡Una dulce receta para los tuyos!",
		/*  9 */ "Te mereces unas fiestas sin estrés.",
		/* 10 */ "¡¿Alguien dijo HOLIDAY CHURROS?!",
		/* 11 */ "¡Súbele el volumen a tus fiestas!",
		/* 12 */ "Crea candelabros por arte de magia.");

	

	$description = array(
		/*  1 */ "Abre la magia haciendo clic en el enlace. Pista: A todos nos encantan las cosas gratis.",
		/*  2 */ "Abre la magia haciendo clic en el enlace. Pista: 3 maneras de disfrutar el pavito que sobró.",
		/*  3 */ "Abre la magia haciendo clic en el enlace. Pista: Algo divertido para hacer con los niños.",
		/*  4 */ "Abre la magia haciendo clic en el enlace. Pista: Calcula cuántos pasos diste en la pista de baile.",
		/*  5 */ "Abre la magia haciendo clic en el enlace. Pista: Una manera divertida de hacer el tradicional intercambio de regalos.",
		/*  6 */ "Abre la magia haciendo clic en el enlace. Pista: La época se hace alegre con estas decoraciones.",
		/*  7 */ "Abre la magia haciendo clic en el enlace. Pista: Un accesorio de música que sigue tu ritmo.",
		/*  8 */ "Abre la magia haciendo clic en el enlace. Pista: Disfrútalo durante un día lluvioso bajo las cobijas.",
		/*  9 */ "Abre la magia haciendo clic en el enlace. Pista: Menos OOPS. ¡Más WEPA!",
		/* 10 */ "Abre la magia haciendo clic en el enlace. Pista: Un postre clásico con un dulce twist.",
		/* 11 */ "Abre la magia haciendo clic en el enlace. Pista: Sonido tan real que creerás que te están dando posadas.",
		/* 12 */ "Abre la magia haciendo clic en el enlace. Pista: Ilumina tus fiestas con este truco sencillo.");

	$startDate = $GLOBALS["startDate"];

	$start = DateTime::createFromFormat("Ymd", $startDate, new DateTimeZone("UTC"));
	$today = DateTime::createFromFormat("Ymd", date('Ymd'), new DateTimeZone('UTC')); 
	$today->add(new DateInterval('P1D'));


	$diffdays = 0;
	
	if ($today > $start) {
		$days = $start->diff($today);
		$diffdays = $days->days;
		$start = $today;
		$start->sub(new DateInterval('P1D'));
	}

	$time = $_GET['tz'];
	$tz = $time * (-100);

	$hour = $hour + $tz;

	download($start,$diffdays,$hour,$title,$description);
}
?>