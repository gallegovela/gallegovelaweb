<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Gallegovela_Taxonomy_Tipo {

	const TAXONOMY = 'tipo_proyecto';

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
				'name'          => __( 'Tipos de proyecto', 'gallegovela-projects' ),
				'singular_name' => __( 'Tipo de proyecto', 'gallegovela-projects' ),
			),
			'hierarchical'  => true,
			'public'        => true,
			'show_in_rest'  => true,
			'rewrite'       => array( 'slug' => 'tipo-proyecto' ),
		) );
	}
}
