$(function() { 

	$('.day .btn').click(function(e){
		e.preventDefault();
		alert('CTA Click !!!');
	});

	$('#btnAddCalendar').click(function(e){
		e.preventDefault();
		hour = $( "#cboHours option:selected" ).val();

        var visitortime = new Date();
    	var visitortimezone = -visitortime.getTimezoneOffset()/60;

		location.href=url+"get/"+hour+"?tz="+visitortimezone;
	});

	

	$('.scroll').jscroll({
    loadingHtml: '',
    padding: 20,
    debug:true,
    nextSelector: '.next a:last',
    //autoTrigger: false,
    contentSelector: '.wrapper',
    callback: function(){
    	//debugger;
    	//console.log($(this).html());
    }
	}); 

})
