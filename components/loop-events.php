<?php 
	$index_arguments = array(
		'post_type' => 'events',
		'posts_per_page' => -1,
		'meta_query' => array(
			'relation' => 'AND',
			'current_day' => array (
				'key' => 'date',
				'compare' => '=',
				'type' => 'DATE'
			),
			'current_event_time' => array (
				'key' => 'event_time',
				'compare' => 'EXISTS'
			)
		),
		'orderby' => array(
			'current_day' => 'DESC',
			'current_event_time' => 'DESC'
		)
	);
	$index_query = new WP_Query($index_arguments);
 
	if( $index_query->have_posts() ):
		while( $index_query->have_posts() ):
			$index_query->the_post();
			get_template_part('components/row', 'events');
		endwhile;
	else:
		echo "currently no events";
	endif;
	
?>