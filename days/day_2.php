<?php if(isset($quit_scroll)&&$quit_scroll==true){

	$scroll = "hide_scroll";

}
else{
	$scroll = "scroll";
}

?>

<div class="wrapper <?php echo $scroll; ?>" >
	<div class="day container day_02" id="day_1">
		<a href="#" class="btn btn_comparte">
			<img src="img/comparte.png">	
		</a>
		<a href="javascript:play_video_flan()" class="btn btn_video">
			<img src="img/play.png">	
		</a>
		<img src="img/day_02.png" class="display">	

			
	</div>
	<?php if($scroll_day>$day){?>
	<span class="next"><a href="3"></a></span>
	<?php }?>

	<div class="day_video" style="display:none">
		<video width="404" height="718" id="video_flan">
		  <source src="videos/flan.mp4" type="video/mp4">
		  <source src="videos/flan.ogv" type="video/ogg">
		Your browser does not support the video tag.
		</video>
	</div>

</div>
<script type="text/javascript">
	function play_video_flan(){
		var myVideo = document.getElementById("video_flan"); 
		myVideo.play(); 	
	}
</script>