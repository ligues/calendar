var option = "";
var video_day = "";
var is_android = /Android/i.test(navigator.userAgent);
var is_iOS = /iPad|iPhone|iPod/.test(navigator.platform);
var belt = false;
var wpActive = false;
var currentScrollDay = 1;
var d = new Array(13);

// Function to load and initiate the Analytics tracker
function gaTracker(id){
  $.getScript('//www.google-analytics.com/analytics.js'); // jQuery shortcut
  window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
  ga('create', id, 'auto');
  ga('send', 'pageview');
  //ga('send', 'event','home','load','pageview','');
}

// Function to track a virtual page view
function gaTrack(category, action,label,value) {
    console.log(category + ", " +  action + ", " +  label + ", " +  value);
    //ga('set', { page: path, title: title });
    ga('send', 'event',category,action,label,value);
    //ga('send', 'pageview')
}

// Initiate the tracker after app has loaded
gaTracker('UA-27604548-11');

function createWayPoint(id) {
    switch(id) {
        case "2": case 2:
            d[2] = $('#day_2').waypoint(function(direction) {
                gaTrack("home","scroll","day",2);
            });
            break;
        case "3": case 3:
            d[3] = $('#day_3').waypoint(function(direction) {
                gaTrack("home","scroll","day",3);
            });
            break;
        case "4": case 4:
            d[4] = $('#day_4').waypoint(function(direction) {
                gaTrack("home","scroll","day",4);
            });
            break;
        case "5": case 5:
            d[5] = $('#day_5').waypoint(function(direction) {
                gaTrack("home","scroll","day",5);
            });
            break;
        case "6": case 6:
            d[6] = $('#day_6').waypoint(function(direction) {
                gaTrack("home","scroll","day",6);
            });
            break;
        case "7": case 7:
            d[7] = $('#day_7').waypoint(function(direction) {
                gaTrack("home","scroll","day",7);
            });
            break;
        case "8": case 8:
            d[8] = $('#day_8').waypoint(function(direction) {
                gaTrack("home","scroll","day",8);
            });
            break;
        case "9": case 9:
            d[9] = $('#day_9').waypoint(function(direction) {
                gaTrack("home","scroll","day",9);
            });
            break;
        case "10": case 10:
            d[10] = $('#day_10').waypoint(function(direction) {
                gaTrack("home","scroll","day",10);
            });
            break;
        case "11": case 11:
            d[11] = $('#day_11').waypoint(function(direction) {
                gaTrack("home","scroll","day",11);
            });
            break;
        case "12": case 12:
            d[12] = $('#day_12').waypoint(function(direction) {
                gaTrack("home","scroll","day",12);
            });
            break;
    }
}

$(function() { 

    if (is_android) {
        $('#instructionsAndroid').show();
        $('#instructionsIOS').hide();
    } else {
        $('#instructionsAndroid').hide();
        $('#instructionsIOS').show();
    }

    //DOWNLOAD CALENDAR
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
        
        if(belt){
            gaTrack('overlay','click','download','1');
        }   
        else{
            gaTrack('overlay','click','download','0');    
        }

        handleOverlayClosed(); 
        $('#download').fadeOut("slow");
	});


    //UTILITY BELT CLICK
    $('#btnDownloadCalendar').click(function(e){
        e.preventDefault();

        gaTrack('belt','click','',0);
        
        $('#download').fadeIn("slow", function(){
            $('#downloadOverlay').height($(window).height());
        });
        
        belt = true;
        //$('#download').fadeIn("slow");
    });	

    
    //NO THANKS
    $('.no_thanks').click(function(e){
        if(belt){
            gaTrack('overlay','click','skip','1');
        }   
        else{
            gaTrack('overlay','click','skip','0');    
        }
    });

    //SELECT HOURS

    $('#cboHours').change(function(e){
        
        if(belt){
            gaTrack('overlay','select',$(this).val(),'1');
        }   
        else{
            gaTrack('overlay','select',$(this).val(),'0');    
        }

    })

    //INIT SCROLL
	$('.scroll').jscroll({
        loadingHtml: '',
        padding: 20,
        nextSelector: '.next a:last',
        contentSelector: '.wrapper',
        callback: function() {
            //createWayPoint(currentScrollDay);
            //gaTrack("home","scroll","day",currentScrollDay);

            currentScrollDay += 1;
            createWayPoint(currentScrollDay);

            if ($("#day_00").length) {
                d[0] = $('#day_00').waypoint(function(direction) {
                    if (wpActive) {
                        gaTrack("home","scroll","day",0);
                    }
                });
            }

        }
	}); 

    d[0] = $('#day_00').waypoint(function(direction) {
        if (wpActive) {
            gaTrack("home","scroll","day",0);
        }
    });

    d[1] = $('#scrollDay1').waypoint(function(direction) {
        if (wpActive) {
            gaTrack("home","scroll","day",1);
        }
    });

    d[2] = $('#day_2').waypoint(function(direction) {
        if (wpActive) {
            gaTrack("home","scroll","day",2);
        }
    });

    d[3] = $('#day_3').waypoint(function(direction) {
        if (wpActive) {
            gaTrack("home","scroll","day",3);
        }
    });

    d[4] = $('#day_4').waypoint(function(direction) {
        if (wpActive) {
            gaTrack("home","scroll","day",4);
        }
    });

    d[5] = $('#day_5').waypoint(function(direction) {
        if (wpActive) {
            gaTrack("home","scroll","day",5);
        }
    });

    d[6] = $('#day_6').waypoint(function(direction) {
        if (wpActive) {
            gaTrack("home","scroll","day",6);
        }
    });

    d[7] = $('#day_7').waypoint(function(direction) {
        if (wpActive) {
            gaTrack("home","scroll","day",7);
        }
    });

    d[8] = $('#day_8').waypoint(function(direction) {
        if (wpActive) {
            gaTrack("home","scroll","day",8);
        }
    });

    d[9] = $('#day_9').waypoint(function(direction) {
        if (wpActive) {
            gaTrack("home","scroll","day",9);
        }
    });

    d[10] = $('#day_10').waypoint(function(direction) {
        if (wpActive) {
            gaTrack("home","scroll","day",10);
        }
    });

    d[11] = $('#day_11').waypoint(function(direction) {
        if (wpActive) {
            gaTrack("home","scroll","day",11);
        }
    });

    d[12] = $('#day_12').waypoint(function(direction) {
        if (wpActive) {
            gaTrack("home","scroll","day",12);
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

//EVENT SHARE
function share(obj) {
    var post = $(obj).data("url");

    window.open('https://www.facebook.com/sharer/sharer.php?u=' + post, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
    return false;
}

//CLOSE VIDEO
function closeVideo() {
    var video = document.getElementById("video_"+option);

    gaTrack('video','click','ended',video_day);

    video.pause();
    video.currentTime = 0;
    video.load();
    $(".video").hide();
    $("#videoContent").hide();
    $("html").show();
}

//PLAY VIDEO
function play_video(current, day){
    option = current;
    video_day = day;

    gaTrack('video','click','play',day);

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
