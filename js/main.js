$(function() { 

	$('.day .btn').click(function(e){
		e.preventDefault();
		alert('CTA Click !!!');
	});

	$('#btnAddCalendar').click(function(e){
		e.preventDefault();
		hour = $( "#cboHours option:selected" ).val();
		location.href="http://localhost/calendar/get/"+hour;
	});

})
