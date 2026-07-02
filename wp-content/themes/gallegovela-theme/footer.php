<footer id="site-footer" class="gv-footer">
	<div class="gv-container">
		<?php get_template_part( 'template-parts/footer-columns' ); ?>

		<p class="gv-footer__copy">
			&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>
		</p>
	</div>
</footer>

<?php
$gv_pub_ids = get_option( 'gallegovela_publicidad_logo_ids', array() );
if ( get_theme_mod( 'gallegovela_footer_publicidad_enabled', false ) && ! empty( $gv_pub_ids ) ) :
?>
<div class="gv-footer__publicidad">
	<div class="gv-container gv-footer__publicidad-inner">
		<?php foreach ( $gv_pub_ids as $gv_pub_id ) :
			$gv_pub_url = wp_get_attachment_image_url( (int) $gv_pub_id, 'full' );
			if ( ! $gv_pub_url ) continue;
		?>
			<img src="<?php echo esc_url( $gv_pub_url ); ?>" alt="" loading="lazy">
		<?php endforeach; ?>
	</div>
</div>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
