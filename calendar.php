<?php

function dateToCal($timestamp) {
  return date('Ymd\THis\Z', $timestamp);
}

// Escapes a string of characters
function escapeString($string) {
  return preg_replace('/([\,;])/','\\\$1', $string);
}

function download($startDate, $startDay, $hour, $titles, $descriptions) {
	header('Content-type: text/calendar; charset=utf-8');
	header('Content-Disposition: attachment; filename=gifts.ics');

	?>
BEGIN:VCALENDAR

VERSION:2.0

PRODID:-//hacksw/handcal//NONSGML v1.0//EN

CALSCALE:GREGORIAN
	<?php

	//$ttime = $hour + 6;
	$sd = $startDate;

	$startHour = sprintf('%04d', $hour);
	$endHour = sprintf('%04d', $hour + 100);
	$totalDays = $GLOBALS["totalDays"];

	for ($i = $startDay; $i <= $totalDays; $i++) {
		//$sd = new DateTime($startDate, new DateTimeZone('PDT'));
		
		$day = $sd->format("d");

		$sd->setTimezone(new DateTimeZone('UTC'));
		 
		// - Set to UTC ICAL FORMAT -
		$stime = $sd->format('Ymd').'T'.$startHour.'00Z';
		
		$etime = $sd->format('Ymd').'T'.$endHour.'00Z';


// 3. Echo out the ics file's contents
?>

BEGIN:VEVENT

UID:<?= uniqid() ?>

DESCRIPTION:<?= escapeString($descriptions[$i-1]) ?>

LOCATION:<?= escapeString($GLOBALS["url"].($i)) ?>

URL;VALUE=URI:<?= escapeString($GLOBALS["url"].($i)) ?>

SUMMARY:<?= escapeString($titles[$i-1]) ?>

DTSTART:<?= $stime; ?>

DTEND:<?= $etime; ?>

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