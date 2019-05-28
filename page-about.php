<?php
/*
Template Name: About
*/
?>
<?php get_header(); ?>
<main data-barba="container" data-barba-namespace="about">
<?php $page = get_page_by_path('about') ?>
<?= wpautop($page->post_content); ?>
<?php get_footer(); ?>