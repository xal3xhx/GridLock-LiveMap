<div class="footer">
	by (Alex)#6074 \ xal3xhx
<?php
	$time = microtime();
	$time = explode(' ', $time);
	$time = $time[1] + $time[0];
	$finish = $time;
	$total_time = round(($finish - $start), 4);
	echo '<br> Page generated in '.$total_time.' seconds.';
?>
</div>

