<footer id="site-footer" class="gv-footer">
	<div class="gv-container">
		<?php get_template_part( 'template-parts/footer-columns' ); ?>

		<p class="gv-footer__copy">
			&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>
		</p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
