<?php if(isset($quit_scroll)&&$quit_scroll==true){

	$scroll = "hide_scroll";

}
else{
	$scroll = "scroll";
}

?>

<div class="wrapper <?php echo $scroll; ?>" >

<div class="day container day_05"  id="day_5">
	<a href="javascript:void(0)" onclick="share(this);gaTrack('home','click','share','day_5');" data-url="<?php echo $GLOBALS['url']; ?>5?s=facebook" class="btn btn_comparte">
		<img src="img/comparte.png">	
	</a>
	<img src="img/day_05.png" class="display">
	<?php if($scroll_day>$day){?>
	<span class="next"><a href="6"></a></span>
	<?php } else{?>
	<span class="next"><a href="days/future.php"></a></span>
	<?php }?>
</div>
</div>