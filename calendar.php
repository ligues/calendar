<?php

function dateToCal($timestamp) {
  return date('Ymd\THis\Z', $timestamp);
}

// Escapes a string of characters
function escapeString($string) {
  return preg_replace('/([\,;])/','\\\$1', $string);
}

function get_calendar($startDate, $hour, $titles, $descriptions) {
	header('Content-type: text/calendar; charset=utf-8');
	header('Content-Disposition: attachment; filename=gifts.ics');

	?>
BEGIN:VCALENDAR

VERSION:2.0

PRODID:-//hacksw/handcal//NONSGML v1.0//EN

CALSCALE:GREGORIAN
	<?php

	$days = count($titles);
	$ttime = $hour + 6;
	$sd = DateTime::createFromFormat("Ymd", $startDate, new DateTimeZone('PDT'));


	for ($i = 0; $i < $days; $i++) {
		//$sd = new DateTime($startDate, new DateTimeZone('PDT'));
		
		$day = $sd->format("d");

		$sd->setTimezone(new DateTimeZone('UTC'));
		 
		// - Set to UTC ICAL FORMAT -
		$stime = $sd->format('Ymd').'T'.$ttime.'0000Z';


// 3. Echo out the ics file's contents
?>

BEGIN:VEVENT

UID:<?= uniqid() ?>

DESCRIPTION:<?= escapeString($descriptions[$i]) ?>

URL;VALUE=URI:<?= escapeString("http://localhost/calendar/".$day) ?>

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

$description = ["day 1", "day 2", "day 3", "day 4"];
$title = ["title day 1", "title day 2", "title day 3", "title day 4"];

get_calendar('20151201',15,$title,$description);
?>