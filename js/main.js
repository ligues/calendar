var option = "";
var nua = navigator.userAgent;
var is_android = ((nua.indexOf('Mozilla/5.0') > -1 && nua.indexOf('Android ') > -1 &&     nua.indexOf('AppleWebKit') > -1) && !(nua.indexOf('Chrome') > -1));
var is_iOS = /iPad|iPhone|iPod/.test(navigator.platform);

$(function() { 


	$('#btnAddCalendar').click(function(e){
		e.preventDefault();
		hour = $( "#cboHours option:selected" ).val();

        var visitortime = new Date();
    	var visitortimezone = -visitortime.getTimezoneOffset()/60;

    	$.cookie('calendar','download');

		//location.href=url+"get/"+hour+"?tz="+visitortimezone;
        //location.href="googlechrome://12diasdemagia.com/"+"get/"+hour+"?tz="+visitortimezone;
        //window.open("calshow://12diasdemagia.com/"+"get/"+hour+"?tz="+visitortimezone, "_system");
        if (is_android) {
            location.href="googlechrome://12diasdemagia.com/"+"get/"+hour+"/"+visitortimezone;
        } else if (is_iOS) {
            window.open("webcal://12diasdemagia.com/"+"get/"+hour+"/"+visitortimezone);    
        } else {
            location.href=url+"get/"+hour+"/"+visitortimezone;
        }
        


        handleOverlayClosed(); 
        $('#download').fadeOut("slow");
	});

    $('#btnDownloadCalendar').click(function(e){
        e.preventDefault();
        
        $('#download').fadeIn("slow", function(){
            $('#downloadOverlay').height($(window).height());
        });
        

        //$('#download').fadeIn("slow");
    });	

	$('.scroll').jscroll({
    loadingHtml: '',
    padding: 20,
    //debug:true,
    nextSelector: '.next a:last',
    //autoTrigger: false,
    contentSelector: '.wrapper',
    callback: function(){
    	//debugger;
    	//console.log($(this).html());
    }
	}); 


    $("#video_flan").bind("ended", function() {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullScreen) {
            document.webkitExitFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if ($(this)[0].webkitCancelFullScreen) {
            $(this)[0].webkitCancelFullScreen();
        } else if ($(this)[0].webkitExitFullScreen) {
            $(this)[0].webkitExitFullScreen();
        } else if ($(this)[0].mozCancelFullScreen) {
            $(this)[0].mozCancelFullScreen();
        } 

        closeVideo();
    });

    $("#video_chocolate").bind("ended", function() {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullScreen) {
            document.webkitExitFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if ($(this)[0].webkitCancelFullScreen) {
            $(this)[0].webkitCancelFullScreen();
        } else if ($(this)[0].webkitExitFullScreen) {
            $(this)[0].webkitExitFullScreen();
        } else if ($(this)[0].mozCancelFullScreen) {
            $(this)[0].mozCancelFullScreen();
        } 

        closeVideo();
    });

    $("#video_churro").bind("ended", function() {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullScreen) {
            document.webkitExitFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if ($(this)[0].webkitCancelFullScreen) {
            $(this)[0].webkitCancelFullScreen();
        } else if ($(this)[0].webkitExitFullScreen) {
            $(this)[0].webkitExitFullScreen();
        } else if ($(this)[0].mozCancelFullScreen) {
            $(this)[0].mozCancelFullScreen();
        } 

        closeVideo();
    });

    var videoFlan = document.getElementById("video_flan");
    var videoChocolate = document.getElementById("video_chocolate");
    var videoChurro = document.getElementById("video_churro");

    
    document.addEventListener("fullscreenchange", function () {
        if (!document.fullscreen) {
            closeVideo();
        }
    }, false);
    document.addEventListener("mozfullscreenchange", function () {
        if (!document.mozFullScreen) {
            closeVideo();
        }
    }, false);
    document.addEventListener("webkitfullscreenchange", function () {
        if (!document.webkitIsFullScreen) {
            closeVideo();
        }
    }, false);

    videoFlan.addEventListener("webkitendfullscreen", function() {
        closeVideo();
    }, false);

    videoChocolate.addEventListener("webkitendfullscreen", function() {
        closeVideo();
    }, false);

    videoChurro.addEventListener("webkitendfullscreen", function() {
        closeVideo();
    }, false);


    

    
});

function share(obj) {
    var post = $(obj).data("url");

    window.open('https://www.facebook.com/sharer/sharer.php?u=' + post, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
    return false;
}

function closeVideo() {
    var video = document.getElementById("video_"+option);

    video.pause();
    video.currentTime = 0;
    video.load();
    $(".video").hide();
    $("#videoContent").hide();
    $("html").show();
}



function play_video(current){
    option = current;

    var video = document.getElementById("video_" + option);    
    
    $(".day_video").hide();
    $("#video_"+option).show();
    $("#videoContent").show();

    video.load();
    video.play();

    if (video.requestFullscreen) {
        video.requestFullscreen();
    } else if (video.msRequestFullscreen) {
        video.msRequestFullscreen();
    } else if (video.mozRequestFullScreen) {
        video.mozRequestFullScreen();
    } else if (video.webkitEnterFullscreen) {
        video.webkitEnterFullscreen();
    } else if (video.webkitRequestFullscreen) {
        video.webkitRequestFullscreen();
    } 
}
