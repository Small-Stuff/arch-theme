<?php get_header(); ?>

<main data-barba="container" data-barba-namespace="home">
	<section>
		<?php get_template_part('components/menu', 'calendar'); ?>
		<?php get_template_part('components/menu', 'index'); ?>	
	</section>
	


<!-- 
	page structure
	- opening load-in
		- needs current day, then how far we're into the current day
	- //open "menu"
	- events:
		- today's event needs time based class
		
 -->
<?php get_template_part('components/loop', 'day') ?>
<?php get_footer(); ?>