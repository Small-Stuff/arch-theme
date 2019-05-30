<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, user-scalable=no">
	<title><?php bloginfo( 'name' ); ?></title>
	<?php wp_head(); ?>
</head>
<body data-barba="wrapper">
<?php get_template_part('components/menu'); ?>
<?php get_template_part('components/loop', 'botd') ?>