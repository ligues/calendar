<?php if(isset($quit_scroll)&&$quit_scroll==true){

	$scroll = "hide_scroll";

}
else{
	$scroll = "scroll";
}

?>

<div class="wrapper <?php echo $scroll; ?>">
<div class="day container day_12"  id="day_12">
	<a href="javascript:void(0)" onclick="share(this);gaTrack('home','click','share','day_12');" data-url="<?php echo $GLOBALS['url']; ?>12/facebook" class="btn btn_comparte">
		<img src="img/comparte.png">	
	</a>
	<img src="img/day_12.png" class="display">
</div>
</div>

<div style="height: 140px; width: 100%"></div>