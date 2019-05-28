<section>
<?php 
	echo get_the_title().' '.get_field('date', false, false).' '.get_field('event_time').'<br>'; 

	/*
		- needs class to determine whether faded out
		- needs class to determine BOTD
		
	*/
?>

<?php 
	$id = get_the_ID(); 
?>
<a href="<?= get_permalink(); ?>"><?= get_the_title(); ?></a>
<?= get_field('date'); ?>
<?= get_field('event_time'); ?>
<?= get_field('location'); ?>
<?= get_field('location_url'); ?>
<?= get_terms_str($id, 'event_type'); ?>

</section>