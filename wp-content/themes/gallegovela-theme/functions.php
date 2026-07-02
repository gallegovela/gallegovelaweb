<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'GALLEGOVELA_THEME_VERSION', '0.1.0' );
define( 'GALLEGOVELA_THEME_DIR', get_template_directory() );
define( 'GALLEGOVELA_THEME_URI', get_template_directory_uri() );

require_once GALLEGOVELA_THEME_DIR . '/inc/setup.php';
require_once GALLEGOVELA_THEME_DIR . '/inc/enqueue.php';
require_once GALLEGOVELA_THEME_DIR . '/inc/template-tags.php';
require_once GALLEGOVELA_THEME_DIR . '/inc/customizer.php';
require_once GALLEGOVELA_THEME_DIR . '/inc/ajax.php';
