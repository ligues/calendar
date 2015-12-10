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

	header('Content-Type: application/force-download');
	header('Content-Description: File Transfer');
	header('ForceType: application/octet-stream');

	?>
BEGIN:VCALENDAR
PRODID:-//hacksw/handcal//NONSGML v1.0//EN
VERSION:2.0
CALSCALE:GREGORIAN
METHOD:PUBLISH
X-WR-CALNAME:12 Días de Magia
X-WR-TIMEZONE:America/Mexico_City
X-WR-CALDESC:12 Días de Magia\nhttp://12diasdemagia.com
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
DTSTART:<?= $stime; ?>

DTEND:<?= $etime; ?>

DTSTAMP:<?= date('Ymd\THis\Z'); ?>

UID:<?= uniqid() ?>

CREATED:<?= date('Ymd\THis\Z'); ?>

DESCRIPTION:<?= escapeString($descriptions[$i-1]); ?>

LAST-MODIFIED:<?= date('Ymd\THis\Z'); ?>

LOCATION:<?= escapeString($GLOBALS["url"].($i)) . "/calendar"; ?>

SEQUENCE:0
STATUS:CONFIRMED
SUMMARY:<?= escapeString($titles[$i-1]) ?>

TRANSP:TRANSPARENT

END:VEVENT
<?php 
		//$startDate = strtotime("+1 days", $startDate);
		$sd->add(new DateInterval('P1D'));
	} 

?>
END:VCALENDAR
<?php 
	// - full output -
	
}