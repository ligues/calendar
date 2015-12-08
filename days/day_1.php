<?php if(isset($quit_scroll)&&$quit_scroll==true){

	$scroll = "";

}
else{
	$scroll = "scroll";
}

?>

<div class="<?php echo $scroll; ?>" >
	
	<div class="day container day_01" id="day_1">
		<a href="https://www.att.com/es-us/shop/wireless/bundles-free-lg-g-pad-f-8.html" class="btn btn_aprende">
			<img src="img/aprende.png">	
		</a>
		<img src="img/day_01.png" class="display">
	</div>	
	
	<?php if($scroll_day>$day){?>
	<span class="next"><a href="2"></a></span>
	<?php }?>
</div>






