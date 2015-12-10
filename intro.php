
<div class="home container">
	<a href="javascript:void(0);" id="btnDownloadCalendar">
		<img src="img/download_button.png" class="downloadButton">
	</a>
	<div id="download">
		<img id="downloadOverlay" src="img/overlay_bg.png" class="display">

		<img id="instructionsAndroid" src="img/overlay_android.png" class="display instructions" style="display: none">
		<img id="instructionsIOS" src="img/overlay_ios.png" class="display instructions" style="display: block">

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
			<a href="javascript:void(0);" id="btnAddCalendar" download target="_system">
				<img src="img/btn_add_calendar.png">
			</a>
		</div>

		<div class="no_thanks">
			<a href="javascript:void(0)" onclick="handleOverlayClosed(); document.getElementById('download').style.display='none';">No gracias, lo descargaré más tarde</a>
		</div>
	</div>
	<script>
		// Handles when first part of the intro has ended and the overlay needs to be shown
		document.addEventListener('intro-ended', function(){
			if ($.cookie('calendar')) {
				handleOverlayClosed();
			} else {
				$('#download').fadeIn("slow");
			}

			$('.days').css("visibility","visible");
			$('.downloadButton').css("visibility","visible");

			var top = 0;

			switch("<?php echo $day; ?>") {
			    case "4":
			        top = 10
			        break;
			    case "7":
			        top = 10
			        break;
			    case "9":
			        top = 18
			        break;
			    case "9":
			        top = 11
			        break;
			    default:
			        top = 0;
			}

			//console.log($("#day_<?php echo $day; ?>").offset().top)

			$('html, body').animate({
		        scrollTop: $("#day_<?php echo $day; ?>").offset().top //- parseInt(top)
		    }, 1000);
			
		});		

		// Handles when the user finishes dragging and the animation has been completed, hides the canvas.
		document.addEventListener('drag-ended', function(){
			document.getElementById('canvas-intro').style.display = "none";
			gaTrack('intro','animation','ended','');
		});
	</script>
	
	<div id="canvas-intro">
	    <canvas id="canvas" width="640" height="1028"></canvas>
	</div>

</div>