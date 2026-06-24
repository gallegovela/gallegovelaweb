<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function gallegovela_customize_register( WP_Customize_Manager $wp_customize ) {
	$wp_customize->add_section( 'gallegovela_hero', array(
		'title'    => __( 'Hero (Home)', 'gallegovela-theme' ),
		'priority' => 30,
	) );

	$wp_customize->add_setting( 'gallegovela_hero_background', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'gallegovela_hero_background', array(
		'label'       => __( 'Imagen de fondo del Hero', 'gallegovela-theme' ),
		'description' => __( 'Imagen de la Media Library usada como fondo de la sección Hero en la Home.', 'gallegovela-theme' ),
		'section'     => 'gallegovela_hero',
		'mime_type'   => 'image',
	) ) );
}
add_action( 'customize_register', 'gallegovela_customize_register' );

/**
 * URL de la imagen de fondo del Hero: la configurada en el Customizer
 * (Media Library) o, si no hay ninguna, el asset por defecto del theme.
 */
function gallegovela_get_hero_background_url() {
	$gv_attachment_id = (int) get_theme_mod( 'gallegovela_hero_background', 0 );

	if ( $gv_attachment_id > 0 ) {
		$gv_url = wp_get_attachment_image_url( $gv_attachment_id, 'full' );

		if ( $gv_url ) {
			return $gv_url;
		}

		// El attachment fue eliminado de la Media Library; limpiamos el theme_mod obsoleto.
		remove_theme_mod( 'gallegovela_hero_background' );
	}

	return GALLEGOVELA_THEME_URI . '/assets/images/hero-background.png';
}
