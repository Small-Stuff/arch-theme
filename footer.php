
</main>
<footer>
	<section class="footer_column">
		<?= wpautop(the_field('footer_left_column', 'option')) ?>
	</section
	><section class="footer_column">
		<?= wpautop(the_field('footer_right_column', 'option')) ?>
	</section>
</footer>
<?php wp_footer(); ?>
</body>
</html>