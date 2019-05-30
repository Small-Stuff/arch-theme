<?php 
	
	$botd_arguments = array(
		'post_type' => 'events',
		'posts_per_page' => -1,
		'meta_key' => 'date',
		'orderby' => 'meta_value',
		'order' => 'desc',
		'tax_query' => array(
			array(
				'taxonomy' => 'event_type',
				'field' => 'slug',
				'terms' => 'building-of-the-day	',
				'operator' => 'IN'
			)
		)
	);

	$botd_list = new WP_Query($botd_arguments); # get all events by day for silhouttes


	if( $botd_list->have_posts() ):
		while( $botd_list->have_posts() ):
			$botd_list->the_post();				
	#		echo get_field('date', false, false);
			# for persistent background
		endwhile;
	endif;


?>