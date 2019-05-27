<?php 
/*
Template Name: Partners Archive
*/

get_header();
?>

		<main data-barba="container" data-barba-namespace="partners">

		<?php if ( have_posts() ) : ?>

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				#get_template_part( 'template-parts/content/content', 'excerpt' );
				echo 'test sponsors';

				// End the loop.
			endwhile;

			// If no content, include the "No posts found" template.
		else :
			echo 'no posts';

		endif;
		?>

<?php
get_footer();
