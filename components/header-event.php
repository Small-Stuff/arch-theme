<?php 
	$this_event_date = get_field('date', false, false); 
	date_default_timezone_set('US/Eastern');
	$the_date = new DateTime($this_event_date);
	$date_str = $the_date->format('Y-m-d');
	$date_unix = strtotime($date_str);
	$day_of_week = date("l", $date_unix);

	$current_day = new DateTime('today');

	$status = '';

	if($current_day < $the_date):
		$status .= '<span class="day_header">Upcoming Event</span>';
	elseif ($current_day == $the_date):
		$status .= '<span class="day_header">Today</span>';
	elseif ($current_day > $the_date):
		$status .= '<span class="day_header">Recent Event</span>';
	endif;

?>
<section class="menu_header index_header day_<?= $day_of_week; ?>">
		<h1><?= $status ?> <?= weekday_month_day($this_event_date) ?></h1>
</section>