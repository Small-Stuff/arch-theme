<div class="archtober_calendar">
<h1>Calendar</h1>
<?php 	
	$today = new DateTime('today');
	$today_str = $today->format('Y-m-DD');

	# override
	$today_str = '2019-10-05';

	$day = 1;
	while ( $day <= 31):
		$day_str = ($day < 10) ? '2019-10-0'.$day : '2019-10-'.$day;

		if($day_str < $today_str):
			echo '<button class="cal_day day_recent" id="archtober_'.$day.'">'.$day.'</button>';
		elseif ($day_str == $today_str):
			echo '<button class="cal_day day_current" id="archtober_'.$day.'">'.$day.'</button>';
		elseif ($day_str > $today_str):
			echo '<button class="cal_day day_upcoming" id="archtober_'.$day.'">'.$day.'</button>';
		endif;

		$day++;
	endwhile;
?>
</div>