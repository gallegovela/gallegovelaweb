<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function gallegovela_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );

	load_theme_textdomain( 'gallegovela-theme', GALLEGOVELA_THEME_DIR . '/languages' );

	register_nav_menus( array(
		'primary' => __( 'Menú principal', 'gallegovela-theme' ),
		'footer'  => __( 'Menú de pie de página', 'gallegovela-theme' ),
	) );

	add_image_size( 'gallegovela-card', 480, 320, true );

	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1200; // alineado con el grid del theme, requerido por WPBakery.
	}
}
add_action( 'after_setup_theme', 'gallegovela_theme_setup' );
