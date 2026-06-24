<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Gallegovela_Shortcodes {

	private static $instance = null;

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		add_shortcode( 'gv_proyectos_destacados', array( $this, 'render_proyectos_destacados' ) );
		add_shortcode( 'gv_proyecto_galeria', array( $this, 'render_proyecto_galeria' ) );
	}

	public function render_proyectos_destacados( $atts ) {
		$atts = shortcode_atts( array( 'limite' => 3 ), $atts );

		$proyectos = gallegovela_get_featured_projects( intval( $atts['limite'] ) );

		if ( empty( $proyectos ) ) {
			return '';
		}

		ob_start();
		foreach ( $proyectos as $proyecto ) {
			?>
			<div class="gv-proyecto-card">
				<?php if ( has_post_thumbnail( $proyecto ) ) : ?>
					<a href="<?php echo esc_url( get_permalink( $proyecto ) ); ?>">
						<?php echo get_the_post_thumbnail( $proyecto, 'medium' ); ?>
					</a>
				<?php endif; ?>
				<h3><a href="<?php echo esc_url( get_permalink( $proyecto ) ); ?>"><?php echo esc_html( get_the_title( $proyecto ) ); ?></a></h3>
				<p><?php echo esc_html( get_the_excerpt( $proyecto ) ); ?></p>
			</div>
			<?php
		}
		return ob_get_clean();
	}

	public function render_proyecto_galeria( $atts ) {
		$atts = shortcode_atts( array( 'id' => get_the_ID() ), $atts );
		$ids  = gallegovela_get_proyecto_galeria( intval( $atts['id'] ) );

		if ( empty( $ids ) ) {
			return '';
		}

		ob_start();
		echo '<div class="gv-proyecto-galeria">';
		foreach ( $ids as $attachment_id ) {
			echo wp_get_attachment_image( $attachment_id, 'medium', false, array( 'loading' => 'lazy' ) );
		}
		echo '</div>';
		return ob_get_clean();
	}
}
