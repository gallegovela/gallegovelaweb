<?php
/**
 * Footer de 4 columnas (Branding / Navegación / Servicios / Contacto), según content.md.
 * Contenido literal de Servicios/Contacto pendiente de content.md más allá del nombre
 * de columna — placeholders marcados con TODO.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gv_servicios = array(
	__( 'Desarrollo de software', 'gallegovela-theme' ),
	__( 'DevOps y automatización', 'gallegovela-theme' ),
	__( 'Arquitectura cloud', 'gallegovela-theme' ),
	__( 'Inteligencia artificial aplicada', 'gallegovela-theme' ),
);
?>
<div class="gv-footer__columns">
	<div class="gv-footer__col gv-footer__col--branding">
		<a class="gv-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		<p class="gv-footer__claim">
			<?php
			/* TODO: contenido pendiente de content.md */
			esc_html_e( 'Del concepto a la operación.', 'gallegovela-theme' );
			?>
		</p>
	</div>

	<div class="gv-footer__col">
		<h3 class="gv-footer__col-title"><?php esc_html_e( 'Navegación', 'gallegovela-theme' ); ?></h3>
		<nav aria-label="<?php esc_attr_e( 'Navegación de pie de página', 'gallegovela-theme' ); ?>">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'footer',
				'container'      => false,
				'menu_class'     => 'gv-footer__menu',
				'fallback_cb'    => false,
			) );
			?>
		</nav>
	</div>

	<div class="gv-footer__col">
		<h3 class="gv-footer__col-title"><?php esc_html_e( 'Servicios', 'gallegovela-theme' ); ?></h3>
		<ul class="gv-footer__list">
			<?php foreach ( $gv_servicios as $gv_servicio ) : ?>
				<li><a href="<?php echo esc_url( home_url( '/#sobre-mi' ) ); ?>"><?php echo esc_html( $gv_servicio ); ?></a></li>
			<?php endforeach; ?>
		</ul>
	</div>

	<div class="gv-footer__col">
		<h3 class="gv-footer__col-title"><?php esc_html_e( 'Contacto', 'gallegovela-theme' ); ?></h3>
		<ul class="gv-footer__list">
			<li>
				<a href="<?php echo esc_url( 'mailto:' . 'contacto@gallegovela.es' /* TODO: email definitivo pendiente de content.md */ ); ?>">contacto@gallegovela.es</a>
			</li>
		</ul>
		<a class="gv-button gv-button--primary" href="<?php echo esc_url( home_url( '/contacto' ) ); /* TODO: enlace de contacto definitivo pendiente de content.md */ ?>">
			<?php esc_html_e( 'Hablemos', 'gallegovela-theme' ); ?>
		</a>
	</div>
</div>
