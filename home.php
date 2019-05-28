<?php get_header(); ?>
<main data-barba="container" data-barba-namespace="home">
	<section id="open_menu">
		<?php get_template_part('components/menu', 'calendar'); ?>
		<?php get_template_part('components/menu', 'index'); ?>	
	</section>
<?php get_template_part('components/loop', 'day') ?>
<?php get_footer(); ?>