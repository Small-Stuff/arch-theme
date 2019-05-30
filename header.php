<!DOCTYPE html>
<html>
<head>
	<title><?php bloginfo( 'name' ); ?></title>
	<?php wp_head(); ?>
</head>
<body data-barba="wrapper">
<?php get_template_part('components/menu'); ?>
<?php get_template_part('components/loop', 'botd') ?>