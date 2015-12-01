<?php

function dateToCal($timestamp) {
  return date('Ymd\THis\Z', $timestamp);
}

// Escapes a string of characters
function escapeString($string) {
  return preg_replace('/([\,;])/','\\\$1', $string);
}

function download($startDate, $days, $hour, $titles, $descriptions) {
	header('Content-type: text/calendar; charset=utf-8');
	header('Content-Disposition: attachment; filename=gifts.ics');

	?>
BEGIN:VCALENDAR

VERSION:2.0

PRODID:-//hacksw/handcal//NONSGML v1.0//EN

CALSCALE:GREGORIAN
	<?php

	//$ttime = $hour + 6;
	$sd = DateTime::createFromFormat("Ymd", $startDate, new DateTimeZone('UTC'));


	for ($i = 0; $i < $days; $i++) {
		//$sd = new DateTime($startDate, new DateTimeZone('PDT'));
		
		$day = $sd->format("d");

		$sd->setTimezone(new DateTimeZone('UTC'));
		 
		// - Set to UTC ICAL FORMAT -
		$stime = $sd->format('Ymd').'T'.$hour.'00Z';


// 3. Echo out the ics file's contents
?>

BEGIN:VEVENT

UID:<?= uniqid() ?>

DESCRIPTION:<?= escapeString($descriptions[$i]) ?>

URL;VALUE=URI:<?= escapeString($GLOBALS["url"].$day) ?>

SUMMARY:<?= escapeString($titles[$i]) ?>

DTSTART:<?= $stime; ?>

END:VEVENT

<?php 
		//$startDate = strtotime("+1 days", $startDate);
		$sd->add(new DateInterval('P1D'));
	} 

?>

END:VCALENDAR

<?php 
}


?>