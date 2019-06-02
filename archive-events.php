<?php 
/*
Template Name: Events Archive
*/?>

<?php get_header(); ?>
<main data-barba="container" data-barba-namespace="events-archive">
<!-- introduction text? -->
<?php get_template_part('components/header', 'index') ?>
<?php get_template_part('components/extra', 'eventsfilter') ?>
<section class="index_section_titles">
	<h2 class="index_section_title section_six">Day</h2>
	<h2 class="index_section_title section_six event_title">Event Title</h2>
	<h2 class="index_section_title section_six">Type</h2>
	<h2 class="index_section_title section_six">Location</h2>
	<h2 class="index_section_title section_six">Time</h2>
	<h2 class="index_section_title section_six">Partner</h2>
</section>
<section class="index_sections">
<?php get_template_part('components/loop', 'events'); ?>	
</section>

<?php get_footer(); ?>