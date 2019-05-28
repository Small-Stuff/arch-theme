<?php
/*
Template Name: Single Event
*/
?>

<?php get_header(); ?>
<main data-barba="container" data-barba-namespace="event">
<h1>Archtober 2019 Single events</h1>

<?php 

$id = get_the_ID();
$post = get_post( $id );
$title = get_the_title();
$content = wpautop( $post->post_content );

?>

<?= $title ?>
<?= $content ?>

<?php get_footer(); ?>