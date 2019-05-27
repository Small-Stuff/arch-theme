<?php get_header(); ?>

<main data-barba="container" data-barba-namespace="home">
	<section>
		<?php get_template_part('components/menu', 'calendar'); ?>
		<?php get_template_part('components/menu', 'index'); ?>	
	</section>
	


<!-- 
	page structure
	- opening load-in
	- open "menu"
	- events:
	- need queried chronologically
		- each day needs:
		- recent (i.e. passed) events
		- today's event
			- today's event needs time based class
		- future events
 -->


<?php get_footer(); ?>