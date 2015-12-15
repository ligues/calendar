<?php if(isset($quit_scroll)&&$quit_scroll==true){

	$scroll = "hide_scroll";

}
else{
	$scroll = "scroll";
}

?>

<div class="wrapper <?php echo $scroll; ?>" >
<div class="day container day_07"  id="day_7">
	<a onclick="gaTrack('home','click','cta_7',7);" target="_blank" href="http://www.att.com/shop/wireless/accessories/special-offer.html" class="btn btn_aprende">
		<img src="img/aprende.png">	
	</a>
	<img src="img/day_07.png" class="display">

	<?php if($scroll_day>$day){?>
	<span class="next"><a href="8"></a></span>
	<?php } else{?>
	<span class="next"><a href="days/future.php"></a></span>
	<?php }?>
</div>
</div>