<?php if(isset($quit_scroll)&&$quit_scroll==true){

	$scroll = "hide_scroll";

}
else{
	$scroll = "scroll";
}

?>

<div class="wrapper <?php echo $scroll; ?>" >
<div class="day container day_09"  id="day_9">
	<a onclick="gaTrack('home','click','cta','day_9');" target="_blank" href="http://www.att.com/shop/wireless/accessories/special-offer.html" class="btn btn_aprende">
		<img src="img/aprende.png">	
	</a>
	<img src="img/day_09.png" class="display">
	
</div>

<?php if($scroll_day>$day){?>
<span class="next"><a href="10"></a></span>
<?php } else{?>
	<span class="next"><a href="days/future.php"></a></span>
	<?php }?>
</div>