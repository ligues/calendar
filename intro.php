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
			if ($.cookie('calendar')) {
				handleOverlayClosed();
			} else {
				document.getElementById('download').style.display = "block";
			}

			$('.wrapper').show();
			
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