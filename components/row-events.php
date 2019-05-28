<?php 
	$id = get_the_ID(); 
?>
<?= get_the_title(); ?>
<?= get_field('date'); ?>
<?= get_field('event_time'); ?>
<?= get_field('location'); ?>
<?= get_field('location_url'); ?>
<?= get_terms_str($id, 'event_type'); ?>

<br>

