<?php if(isset($quit_scroll)&&$quit_scroll==true){

	$scroll = "hide_scroll";

}
else{
	$scroll = "scroll";
}

?>

<div class="wrapper <?php echo $scroll; ?>" >
<div class="day container day_08"  id="day_8">
	<a href="#" class="btn btn_comparte">
		<img src="img/comparte.png">	
	</a>
	<a href="#" class="btn btn_video">
		<img src="img/play.png">	
	</a>
	<img src="img/day_08.png" class="display">
	
</div>

<?php if($scroll_day>$day){?>
<span class="next"><a href="9"></a></span>
<?php }?>
</div>