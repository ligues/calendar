<?php if(isset($quit_scroll)&&$quit_scroll==true){

	$scroll = "hide_scroll";

}
else{
	$scroll = "scroll";
}

?>

<div class="wrapper <?php echo $scroll; ?>" >
<div class="day container day_10"  id="day_10">
	<a href="#" class="btn btn_comparte">
		<img src="img/comparte.png">	
	</a>
	<a href="javascript:play_video_churro()" class="btn btn_video">
		<img src="img/play.png">	
	</a>
	<img src="img/day_10.png" class="display">
	
</div>

<?php if($scroll_day>$day){?>
<span class="next"><a href="11"></a></span>
<?php } else{?>
	<span class="next"><a href="days/future.php"></a></span>
	<?php }?>

<div class="day_video" style="display:none">
		<video width="404" height="718" id="video_churro">
		  <source src="videos/churro.mp4" type="video/mp4">
		  <source src="videos/churro.ogv" type="video/ogg">
		Your browser does not support the video tag.
		</video>
	</div>

</div>


<script type="text/javascript">
	function play_video_churro(){
		var myVideo = document.getElementById("video_churro"); 
		myVideo.play(); 	
	}
</script>