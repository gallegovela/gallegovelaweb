<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Gallegovela_Taxonomy_Tecnologia {

	const TAXONOMY = 'tecnologia';

	private static $instance = null;

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		add_action( 'init', array( $this, 'register' ) );
	}

	public function register() {
		register_taxonomy( self::TAXONOMY, array( Gallegovela_CPT_Proyecto::POST_TYPE ), array(
			'labels' => array(
				'name'          => __( 'Tecnologías', 'gallegovela-projects' ),
				'singular_name' => __( 'Tecnología', 'gallegovela-projects' ),
			),
			'hierarchical'  => false,
			'public'        => true,
			'show_in_rest'  => true,
			'rewrite'       => array( 'slug' => 'tecnologia' ),
		) );
	}
}
