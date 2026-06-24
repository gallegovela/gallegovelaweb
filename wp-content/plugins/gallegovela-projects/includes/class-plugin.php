<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Gallegovela_Projects_Plugin {

	private static $instance = null;

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		register_activation_hook( GV_PROJECTS_DIR . 'gallegovela-projects.php', array( $this, 'activate' ) );
		register_deactivation_hook( GV_PROJECTS_DIR . 'gallegovela-projects.php', array( $this, 'deactivate' ) );

		add_action( 'init', array( $this, 'load_textdomain' ) );

		Gallegovela_CPT_Proyecto::instance();
		Gallegovela_Taxonomy_Tipo::instance();
		Gallegovela_Taxonomy_Tecnologia::instance();
		Gallegovela_Proyecto_Meta::instance();
		Gallegovela_Shortcodes::instance();
		Gallegovela_Rest_Api::instance();
	}

	public function activate() {
		flush_rewrite_rules();
	}

	public function deactivate() {
		flush_rewrite_rules();
	}

	public function load_textdomain() {
		load_plugin_textdomain( 'gallegovela-projects', false, dirname( plugin_basename( GV_PROJECTS_DIR ) ) . '/languages' );
	}
}
