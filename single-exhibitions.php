<?php
get_header();

?>

<h1>Archtober 2019 Single Exhibitions</h1>

<?php foreach (get_field('days_closed') as $day): ?>
	<?= $day ?>
<?php endforeach ?>

<?php get_footer(); ?>