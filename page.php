<?php

global $meta; 
$meta = array
  (
  array("2","¡Flan para todos!","Es la época de compartir, por eso te traemos un poco de magia. ¡Descubre 12 días de recetas, ideas festivas y ofertas increíbles aquí!","FLAN.jpg"),
  array("5","Un intercambio único","Es la época de compartir, por eso te traemos un poco de magia. ¡Descubre 12 días de recetas, ideas festivas y ofertas increíbles aquí!","GIFTS.jpg"),
  array("6","Decora a tu manera","Es la época de compartir, por eso te traemos un poco de magia. ¡Descubre 12 días de recetas, ideas festivas y ofertas increíbles aquí!","TREES.jpg"),
  array("8","Rico chocolate caliente","Es la época de compartir, por eso te traemos un poco de magia. ¡Descubre 12 días de recetas, ideas festivas y ofertas increíbles aquí!","COCO.jpg"),
  array("10","Churros para compartir","Es la época de compartir, por eso te traemos un poco de magia. ¡Descubre 12 días de recetas, ideas festivas y ofertas increíbles aquí!","CHURRO.jpg"),
  array("12","Candelabro hecho en casa","Es la época de compartir, por eso te traemos un poco de magia. ¡Descubre 12 días de recetas, ideas festivas y ofertas increíbles aquí!","CANDLES.jpg"),
  );

function get_page($from) {
	$startDate = $GLOBALS["startDate"];
	$endDate = $GLOBALS["endDate"];

	$today = DateTime::createFromFormat("Ymd", date('Ymd'), new DateTimeZone('UTC')); 
	$today->sub(new DateInterval('PT4H'));

	$day = $today->format("d");

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
				$day = $day - $startDay + 1;
			}
		}
	} else {
		$day = $GLOBALS["totalDays"];
	}

	get_day($day, $from);
}


function get_day($day, $from) {
	
	if (isset($_SERVER["HTTP_REFERER"])) {
		$referer = parse_url($_SERVER['HTTP_REFERER']);
		$host = explode(".", $referer['host']);
		$from = $host[1];
	}

?>
<!DOCTYPE html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>AT&amp;T: 12 Días de Magia</title>
		<meta name="description" content="">
		
		<meta name="viewport" content="width=640, user-scalable=no">

		<link rel="stylesheet" href="css/normalize.min.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/fonts/style.css">
		<link rel="stylesheet" href="css/style.css">

		<?php print_meta($day); ?>

		<script src="js/vendor/modernizr-2.8.3.min.js"></script>
		<script src="http://code.createjs.com/easeljs-0.8.1.min.js"></script>
	    <script src="http://code.createjs.com/tweenjs-0.6.1.min.js"></script>
	    <script src="http://code.createjs.com/movieclip-0.8.1.min.js"></script>
	    <script src="http://code.createjs.com/preloadjs-0.6.1.min.js"></script>
	    <script src="animation/canvas.assets.js"></script>
	    <script src="animation/main.js"></script>
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
		<script src="js/vendor/jquery.jscroll.min.js"></script>
		<script type="text/javascript">var url="<?php echo $GLOBALS['url']; ?>";</script>
		<script src="js/vendor/jquery.cookie.js"></script>
		<script src="js/vendor/jquery.waypoints.js"></script>
		<script src="js/main.js"></script>
	    <script type="text/javascript">
	    	var scrollDay = 1;
	    </script>
	</head>
	<body onload="init();">
		<div class="day_bg"></div>
		<?php include("intro.php"); ?>

		<div id="videoContent" style="display: none">
			<video id="video_flan" class="video" preload="none" style="display: none" controls>
				<source src="videos/flan.mp4" type="video/mp4">
				<source src="videos/flan.ogv" type="video/ogg">
				Your browser does not support the video tag.
			</video>

			<video id="video_chocolate" class="video" preload="none" style="display: none" controls>
				<source src="videos/chocolate.mp4" type="video/mp4">
				<source src="videos/chocolate.ogv" type="video/ogg">
				Your browser does not support the video tag.
			</video>

			<video id="video_churro" class="video" preload="none" style="display: none" controls>
				<source src="videos/churro.mp4" type="video/mp4">
				<source src="videos/churro.ogv" type="video/ogg">
				Your browser does not support the video tag.
			</video>
		</div>

		<div class="days">

		<?php 

			$startDate = $GLOBALS["startDate"];

			$start = DateTime::createFromFormat("Ymd", $startDate, new DateTimeZone("UTC"));
			$today = DateTime::createFromFormat("Ymd", date('Ymd'), new DateTimeZone('UTC')); 
			//$today = DateTime::createFromFormat("Ymd", '20151221', new DateTimeZone('UTC')); 
			$today->sub(new DateInterval('PT4H'));
			$today->add(new DateInterval('P1D'));

			$diffdays = 0;
			
			if ($today > $start) {
				$days = $start->diff($today);
				$diffdays = $days->days;
				$start = $today;
				$start->sub(new DateInterval('P1D'));
			}

			global $scroll_day;

			$scroll_day = $diffdays;


			/* AJAX check  */
			if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
				
				$quit_scroll = false;
				include("days/day_".$day.".php"); 	
			}
			else{
				global $quit_scroll;

				
				for ($i=1; $i < $day; $i++) { 
					$quit_scroll = true;
					if ($i <= $diffdays) {
						include("days/day_".$i.".php");	
					}
				}
			
				$quit_scroll = false;

				if ($day <= $diffdays) {
					include("days/day_".$day.".php");

					echo "<script>scrollDay = '$day'; currentScrollDay = $day;</script>";
				} else {
					include("days/future.php");
					
					echo "<script>scrollDay = '00'; currentScrollDay = 0;</script>";
				}				
				
			}
			
		?>
		</div>

		<script type="text/javascript">
			gaTrack('home','origin','<?php echo $from; ?>',0);
		</script>
	</body>
</html>
	<?php
}



function get_calendar($hour, $time) {

	require_once("calendar.php");

    
	$title = array(
		/*  1 */ "Un lindo detalle para tus fiestas.", /* 1 */
		/*  2 */ "El postre favorito de todos es fácil de hacer.",
		/*  3 */ "¡Con baterías cargadas la fiesta nunca acaba!",
		/*  4 */ "Más ahorros significa más regalos bajo el árbol.",
		/*  5 */ "¡Un intercambio que todos recordarán!",
		/*  6 */ "Esparce la magia con este lindo detalle.",
		/*  7 */ "Sin música, ¡no hay fiesta!",
		/*  8 */ "¡Una dulce receta para los tuyos!",
		/*  9 */ "Te mereces unas fiestas sin estrés.",
		/* 10 */ "¡¿Alguien dijo HOLIDAY CHURROS?!",
		/* 11 */ "A todos nos encanta recibir un lindo detalle.",
		/* 12 */ "Crea candelabros por arte de magia.");

	

	$description = array(
		/*  1 */ "Abre la magia haciendo clic en el enlace. Pista: Dos es mejor que uno.",
		/*  2 */ "Abre la magia haciendo clic en el enlace. Pista: Muuuucho caramelo.",
		/*  3 */ "Abre la magia haciendo clic en el enlace. Pista: Un esencial para estas fiestas.",
		/*  4 */ "Abre la magia haciendo clic en el enlace. Pista: Rellena sus holiday stockings y tus bolsillos",
		/*  5 */ "Abre la magia haciendo clic en el enlace. Pista: Una manera divertida de intercambiar regalos.",
		/*  6 */ "Abre la magia haciendo clic en el enlace. Pista: La época se hace alegre con estas decoraciones.",
		/*  7 */ "Abre la magia haciendo clic en el enlace. Pista: Un accesorio de música que sigue tu ritmo.",
		/*  8 */ "Abre la magia haciendo clic en el enlace. Pista: Disfrútalo durante un día lluvioso bajo las cobijas.",
		/*  9 */ "Abre la magia haciendo clic en el enlace. Pista: Menos OOPS. ¡Más WEPA!",
		/* 10 */ "Abre la magia haciendo clic en el enlace. Pista: Un postre clásico con un dulce twist.",
		/* 11 */ "Abre la magia haciendo clic en el enlace. Pista: Lo último en tecnología para la familia.",
		/* 12 */ "Abre la magia haciendo clic en el enlace. Pista: Ilumina tus fiestas con este truco sencillo.");

	$startDate = $GLOBALS["startDate"];

	$start = DateTime::createFromFormat("Ymd", $startDate, new DateTimeZone("UTC"));
	$today = DateTime::createFromFormat("Ymd", date('Ymd'), new DateTimeZone('UTC')); 
	$today->add(new DateInterval('P1D'));


	$diffdays = 1;
	
	if ($today > $start) {
		$days = $start->diff($today);
		$diffdays = $days->days;
		$start = $today;
		$start->sub(new DateInterval('P1D'));
	}

	$tz = $time * (-100);

	$hour = $hour + $tz;

	download($start,$diffdays,$hour,$title,$description);
}

function print_meta($day){
	global $meta;


	$title = "AT&amp;T: 12 Días de Magia";
	$description = "Es la época de compartir, por eso te traemos un poco de magia. ¡Descubre 12 días de recetas, ideas festivas y ofertas increíbles aquí!";
	$image = 'default.jpg';

	$uri = explode("?",$_SERVER['REQUEST_URI']);

	for ($i=0; $i < count($meta) ; $i++) { 
		
		if($meta[$i][0]==$day){
			$title = $meta[$i][1];
			$description = $meta[$i][2];
			$image = $meta[$i][3];
		}

	}

	$actual_link = "http://$_SERVER[HTTP_HOST]$uri[0]";

	echo "<meta property='og:title' content='".$title."' />\n";
	echo "<meta property='og:type' content='website' />\n";
	echo "<meta property='og:description' content='".$description."' />\n";
	echo "<meta property='og:url' content='".$actual_link."' />\n";
	echo "<meta property='og:image' content='".$GLOBALS['url']."img/meta/".$image."' />\n";

}

?>