<?php if(isset($quit_scroll)&&$quit_scroll==true){

	$scroll = "hide_scroll";

}
else{
	$scroll = "scroll";
}

?>

<div class="wrapper <?php echo $scroll; ?>" >
<div class="day container day_10"  id="day_10">
	<a href="javascript:void(0)" onclick="share(this);gaTrack('home','click','share','day_10');" data-url="<?php echo $GLOBALS['url']; ?>10" class="btn btn_comparte">
		<img src="img/comparte.png">	
	</a>
	<a href="javascript:void(0)" onclick="play_video('churro');" class="btn btn_video">
		<img src="img/play.png">	
	</a>
	<img src="img/day_10.png" class="display">
	
</div>

<?php if($scroll_day>$day){?>
<span class="next"><a href="11"></a></span>
<?php } else{?>
	<span class="next"><a href="days/future.php"></a></span>
	<?php }?>

</div>