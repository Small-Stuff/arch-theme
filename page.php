<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
		<main data-barba="container" data-barba-namespace="general">

			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				echo 'general';

			endwhile; // End of the loop.
			?>


<?php
get_footer();
