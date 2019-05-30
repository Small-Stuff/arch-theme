<?php 
	$index_arguments = array(
		'post_type' => 'exhibitions',
		'posts_per_page' => -1,
		'meta_query' => array(
			'relation' => 'AND',
			'current_day' => array (
				'key' => 'date',
				'compare' => '=',
				'type' => 'DATE'
			),
			'current_exhibition_time' => array (
				'key' => 'opening_time',
				'compare' => 'EXISTS'
			)
		),
		'orderby' => array(
			'current_day' => 'DESC',
			'current_exhibition_time' => 'DESC'
		)
	);
	$index_query = new WP_Query($index_arguments);
	
	if( $index_query->have_posts() ):
		while( $index_query->have_posts() ):
			$index_query->the_post();
			get_template_part('components/row', 'exhibitions');
		endwhile;
		wp_reset_postdata(); # clear query
	else:
		echo "currently no exhibitions";
	endif; 

?>