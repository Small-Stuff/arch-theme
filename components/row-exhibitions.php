<?php $id = get_the_ID(); ?>
<a href="<?= get_permalink(); ?>"><?= get_the_title(); ?></a>
<?= get_field('date'); ?>
<?= get_field('end_date'); ?>
<?= get_field('opening_time'); ?>
<?= get_field('closing_time'); ?>
<?php foreach (get_field('days_closed') as $day): ?>
	<?= $day ?>
<?php endforeach ?>
<?= get_field('location'); ?>
<?= get_field('location_url'); ?>