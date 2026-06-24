<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Cada fichero CSS se encola por separado (en vez de @import en main.css) para
 * que cada uno tenga su propio cache-busting por filemtime(). Con @import,
 * solo el fichero raíz cambiaba de ?ver= al editar un partial — el navegador
 * podía servir una copia cacheada antigua de un partial aunque main.css
 * cambiara de versión.
 */
function gallegovela_theme_enqueue_assets() {
	wp_enqueue_style(
		'gallegovela-google-fonts',
		'https://fonts.googleapis.com/css2?family=Nunito:wght@100;200;400;700;800&family=Open+Sans:wght@100;200;400;600&display=swap',
		array(),
		null
	);

	$css_files = array(
		'base/tokens.css',
		'base/reset.css',
		'base/typography.css',
		'layout/grid.css',
		'layout/header.css',
		'layout/footer.css',
		'components/buttons.css',
		'components/hero.css',
		'components/about.css',
		'components/stack.css',
		'components/cards.css',
		'components/forms.css',
	);

	$gv_previous_handle = 'gallegovela-google-fonts';

	foreach ( $css_files as $gv_css_file ) {
		$gv_path   = GALLEGOVELA_THEME_DIR . '/assets/css/' . $gv_css_file;
		$gv_handle = 'gallegovela-' . str_replace( array( '/', '.css' ), array( '-', '' ), $gv_css_file );

		wp_enqueue_style(
			$gv_handle,
			GALLEGOVELA_THEME_URI . '/assets/css/' . $gv_css_file,
			$gv_previous_handle ? array( $gv_previous_handle ) : array(),
			file_exists( $gv_path ) ? filemtime( $gv_path ) : GALLEGOVELA_THEME_VERSION
		);

		$gv_previous_handle = $gv_handle;
	}

	// Fondo del hero: CSS de respaldo en <head> para garantizar que siempre se muestra.
	// El inline style del template lo sobreescribe si hay imagen del Customizer configurada.
	$gv_hero_bg = function_exists( 'gallegovela_get_hero_background_url' )
		? gallegovela_get_hero_background_url()
		: GALLEGOVELA_THEME_URI . '/assets/images/hero-background.png';

	wp_add_inline_style(
		'gallegovela-components-hero',
		'.gv-hero { background-image: url("' . esc_url( $gv_hero_bg ) . '"); }'
	);

	$js_path = GALLEGOVELA_THEME_DIR . '/assets/js/main.js';
	wp_enqueue_script(
		'gallegovela-main',
		GALLEGOVELA_THEME_URI . '/assets/js/main.js',
		array(),
		file_exists( $js_path ) ? filemtime( $js_path ) : GALLEGOVELA_THEME_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'gallegovela_theme_enqueue_assets' );
