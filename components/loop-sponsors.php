<?php 
	$sponsor_types = get_terms( array(
		'orderby' => 'term_order',
	  'taxonomy' => 'sponsor_type',
	  'hide_empty' => true,
		)
	);

	foreach( $sponsor_types as $sponsor_type ):
		$sponsor_arguments = array(
			'post_type' => 'sponsors',
			'posts_per_page' => -1,
			'tax_query' => array (
				array(
					'taxonomy' => 'sponsor_type',
					'field' => 'slug',
					'terms' => $sponsor_type->slug,
					'operator' => 'IN'
				)
			)
		);
		$sponsor_query = new WP_Query($sponsor_arguments);

		if( $sponsor_query->have_posts() ):
			echo $sponsor_type->name.'<br>';
			while( $sponsor_query->have_posts() ):
				$sponsor_query->the_post();
				get_template_part('components/row', 'sponsors');
			endwhile;
		endif; 
	endforeach;

?>