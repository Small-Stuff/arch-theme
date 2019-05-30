<?php 
	date_default_timezone_set('US/Eastern');
	$start_date = get_field('date', false, false);
	$start_as_date = new DateTime($start_date);
	$start_day = $start_as_date->format('M j');

	$end_date = get_field('end_date', false, false);
	$end_as_date = new DateTime($event_date);
	$end_day = $end_as_date->format('M j');


	$current_day = new DateTime('today');
	# could use graying out when not open? / closed today could be second line?


	/*
	

	open from

	*/

?>
<section class="menu_header index_header day_<?= $day_of_week; ?>">
		<h1><?= $start_day." – ".$end_day ?></h1>
</section>