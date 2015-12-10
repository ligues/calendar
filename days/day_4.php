<?php if(isset($quit_scroll)&&$quit_scroll==true){

	$scroll = "hide_scroll";

}
else{
	$scroll = "scroll";
}

?>

<div class="wrapper <?php echo $scroll; ?>" >

<div class="day container day_04"  id="day_4">
	<a onclick="gaTrack('home','click','cta','day_4');" target="_blank" href="https://www.att.com/es-us/maps/store-locator.html" class="btn btn_localiza">
		<img src="img/localiza.png">	
	</a>
	<img src="img/day_04.png" class="display">
	
</div>

<?php if($scroll_day>$day){?>
<span class="next"><a href="5"></a></span>
<?php } else{?>
	<span class="next"><a href="days/future.php"></a></span>
	<?php }?>

</div>
