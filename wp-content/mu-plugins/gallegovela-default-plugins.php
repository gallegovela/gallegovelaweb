<?php
/**
 * Garantiza que ciertos plugins estén siempre activos, sin importar cómo se
 * haya creado o restaurado el sitio (instalación nueva, volumen restaurado...).
 * Vive en mu-plugins porque se ejecuta solo, sin activación manual.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'plugins_loaded', function () {
	// Si la opción está corrupta/ausente, no tocar nada: mejor no activar
	// nada que arriesgarse a llamar a activate_plugin() con datos inválidos.
	if ( ! is_array( get_option( 'active_plugins' ) ) ) {
		return;
	}

	$gv_default_plugins = array(
		'contact-form-7/wp-contact-form-7.php',
	);

	if ( ! function_exists( 'is_plugin_active' ) ) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
	}

	foreach ( $gv_default_plugins as $gv_plugin ) {
		if ( ! is_plugin_active( $gv_plugin ) && file_exists( WP_PLUGIN_DIR . '/' . $gv_plugin ) ) {
			activate_plugin( $gv_plugin );
		}
	}
} );
