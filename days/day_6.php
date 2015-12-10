<?php if(isset($quit_scroll)&&$quit_scroll==true){

	$scroll = "hide_scroll";

}
else{
	$scroll = "scroll";
}

?>

<div class="wrapper <?php echo $scroll; ?>" >
<div class="day container day_06"  id="day_6">
	<a href="javascript:void(0)" onclick="share(this);gaTrack('home','click','share','day_6');" data-url="<?php echo $GLOBALS['url']; ?>6/facebook" class="btn btn_comparte">
		<img src="img/comparte.png">	
	</a>
	<img src="img/day_06.png" class="display">
	<?php if($scroll_day>$day){?>
	<span class="next"><a href="7"></a></span>
	<?php } else{?>
	<span class="next"><a href="days/future.php"></a></span>
	<?php }?>
</div>
</div>