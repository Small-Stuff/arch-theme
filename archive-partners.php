<?php 
/*
Template Name: Partners Archive
*/
?>
<?php get_header(); ?>
<main data-barba="container" data-barba-namespace="partners">
<?php get_template_part('components/header', 'index') ?>
<section class="index_section_titles index_exhibitions">
	<h2 class="index_section_title section_three event_title">Partner</h2>
	<h2 class="index_section_title section_six">Website</h2>
	<h2 class="index_section_title section_six">Phone</h2>
</section>
<?php get_template_part('components/loop', 'partners'); ?>
<?php get_footer(); ?>
