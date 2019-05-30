<?php 
/*
Template Name: Exhibitions Archive
*/
?>
<?php get_header(); ?>
<main data-barba="container" data-barba-namespace="exhibitions">
	<?php get_template_part('components/header', 'index') ?>
	<section class="index_section_titles index_exhibitions">
		<h2 class="index_section_title section_three event_title">Exhibition Title</h2>
		<h2 class="index_section_title section_three">Location</h2>
		<h2 class="index_section_title section_three">Dates</h2>
	</section>
<?php get_template_part('components/loop', 'exhibitions') ?>
<?php get_footer(); ?>
