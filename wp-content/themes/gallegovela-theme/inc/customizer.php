<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function gallegovela_customize_register( WP_Customize_Manager $wp_customize ) {

	// --- Sección: Cabecera ---
	$wp_customize->add_section( 'gallegovela_header', array(
		'title'    => __( 'Cabecera', 'gallegovela-theme' ),
		'priority' => 25,
	) );

	$wp_customize->add_setting( 'gallegovela_header_logo', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'gallegovela_header_logo', array(
		'label'     => __( 'Logo de cabecera', 'gallegovela-theme' ),
		'section'   => 'gallegovela_header',
		'mime_type' => 'image',
	) ) );

	// --- Sección: Hero (Home) ---
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

	// --- Sección: Pie de página ---
	$wp_customize->add_section( 'gallegovela_footer', array(
		'title'    => __( 'Pie de página', 'gallegovela-theme' ),
		'priority' => 40,
	) );

	// Logo del footer
	$wp_customize->add_setting( 'gallegovela_footer_logo', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'gallegovela_footer_logo', array(
		'label'     => __( 'Logo del pie de página', 'gallegovela-theme' ),
		'section'   => 'gallegovela_footer',
		'mime_type' => 'image',
	) ) );

	// URL LinkedIn
	$wp_customize->add_setting( 'gallegovela_footer_linkedin', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'default'           => '',
	) );

	$wp_customize->add_control( 'gallegovela_footer_linkedin', array(
		'label'   => __( 'URL LinkedIn', 'gallegovela-theme' ),
		'section' => 'gallegovela_footer',
		'type'    => 'url',
	) );

	// URL X (Twitter)
	$wp_customize->add_setting( 'gallegovela_footer_x', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'default'           => '',
	) );

	$wp_customize->add_control( 'gallegovela_footer_x', array(
		'label'   => __( 'URL X (Twitter)', 'gallegovela-theme' ),
		'section' => 'gallegovela_footer',
		'type'    => 'url',
	) );

	// URL GitHub
	$wp_customize->add_setting( 'gallegovela_footer_github', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'esc_url_raw',
		'default'           => '',
	) );

	$wp_customize->add_control( 'gallegovela_footer_github', array(
		'label'   => __( 'URL GitHub', 'gallegovela-theme' ),
		'section' => 'gallegovela_footer',
		'type'    => 'url',
	) );

	// Toggle Publicidad
	$wp_customize->add_setting( 'gallegovela_footer_publicidad_enabled', array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'rest_sanitize_boolean',
		'default'           => false,
	) );

	$wp_customize->add_control( 'gallegovela_footer_publicidad_enabled', array(
		'label'   => __( 'Mostrar sección Publicidad', 'gallegovela-theme' ),
		'section' => 'gallegovela_footer',
		'type'    => 'checkbox',
	) );

	// --- Panel: Home ---
	$wp_customize->add_panel( 'gallegovela_home', array(
		'title'    => __( 'Home', 'gallegovela-theme' ),
		'priority' => 45,
	) );

	// --- Sección: Qué hago ---
	$wp_customize->add_section( 'gallegovela_quehago', array(
		'title' => __( 'Qué hago', 'gallegovela-theme' ),
		'panel' => 'gallegovela_home',
	) );

	$gv_quehago_controls = array(
		'gallegovela_quehago_software'         => __( 'Icono: Desarrollo de software', 'gallegovela-theme' ),
		'gallegovela_quehago_automatizaciones'  => __( 'Icono: DevOps y automatización', 'gallegovela-theme' ),
		'gallegovela_quehago_cloud'             => __( 'Icono: Arquitectura cloud', 'gallegovela-theme' ),
		'gallegovela_quehago_ia'               => __( 'Icono: Inteligencia artificial', 'gallegovela-theme' ),
	);

	foreach ( $gv_quehago_controls as $gv_mod_key => $gv_label ) {
		$wp_customize->add_setting( $gv_mod_key, array(
			'type'              => 'theme_mod',
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, $gv_mod_key, array(
			'label'     => $gv_label,
			'section'   => 'gallegovela_quehago',
			'mime_type' => 'image',
		) ) );
	}
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
