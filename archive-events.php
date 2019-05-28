<?php 
/*
Template Name: Events Archive
*/?>

<?php get_header(); ?>
<main data-barba="container" data-barba-namespace="events">
<!-- introduction text? -->
<?php get_template_part('components/loop', 'events'); ?>
<?php get_footer(); ?>