<?php if(isset($quit_scroll)&&$quit_scroll==true){

	$scroll = "hide_scroll";

}
else{
	$scroll = "scroll";
}

?>

<div class="wrapper <?php echo $scroll; ?>" >
<div class="day container day_12"  id="day_12">
	<a href="javascript:void(0)" onclick="share(this);" data-url="<?php echo $GLOBALS['url']; ?>12" class="btn btn_comparte">
		<img src="img/comparte.png">	
	</a>
	<img src="img/day_12.png" class="display">
</div>
</div>