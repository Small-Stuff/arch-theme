<?php 

	$yesterday = new DateTime('yesterday');
	$yesterday_str = $yesterday->format('Y-m-d');
	$today = new DateTime('today');
	$today_str = $today->format('Y-m-d');
	$day_int = 1;
	$recent_events = false;
	$upcoming_events = false;

	# echo 'current:<br>'.$yesterday_str.' '.$today_str.'<br>';
	#override
	$yesterday_str = '2019-10-2';
	$today_str = '2019-10-3';
	# echo '<br>'.$yesterday_str.' '.$today_str;

	while( $day_int <= 31):
		$date_str = '2019-10-'.$day_int;
		# recent events section
		if($date_str <= $yesterday_str && $recent_events == false):
			echo '<section id="recent_events">';
			$recent_events = true;
		endif;

		# current events section
		if($date_str == $today_str && $recent_events == true):
			echo '</section><section id="todays_events">';
		elseif ($date_str == $today_str && $recent_events == false):
			echo '<section id="todays_events">';
		endif;

		# upcoming events section
		if($date_str > $today_str && $upcoming_events == false):
			echo '<section id="upcoming_events">';
			$upcoming_events = true;
		endif;

		$days_events_arguments = array(
			'post_type' => 'events',
			'posts_per_page' => -1,
			'meta_key' => 'date',
			'meta_query' => array (
					'relation' => 'AND',
					'current_day' => array (
						'key' => 'date',
						'value' => $date_str,
						'compare' => '=',
						'type' => 'DATE'
					),
					'current_event_time' => array (
						'key' => 'event_time',
						'compare' => 'EXISTS'
					),
			),
			'order' => 'ASC',
			'orderby' => 'current_event_time'
		);
		$days_events = new WP_Query($days_events_arguments);
		?>
			<article class="archtober_day" id="'day_<?= $day_int ?>">
		<?php

		echo '<br>'.$day_int.') '.$date_str.'<br>';

		if( $days_events->have_posts() ):
			while( $days_events->have_posts() ):
				$days_events->the_post();
				get_template_part('components/blocks', 'event');
			endwhile;
		else:
			echo "currently no events";
		endif;
		?>
		</article>
		<?php
		
		if($date_str == $today_str):
			echo '</section>';
		endif;

		$day_int++;
	endwhile;
?>
</section>