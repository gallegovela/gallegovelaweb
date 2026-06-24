<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Gallegovela_CPT_Proyecto {

	const POST_TYPE = 'proyecto';

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
		register_post_type( self::POST_TYPE, array(
			'labels' => array(
				'name'               => __( 'Proyectos', 'gallegovela-projects' ),
				'singular_name'      => __( 'Proyecto', 'gallegovela-projects' ),
				'add_new_item'       => __( 'Añadir nuevo proyecto', 'gallegovela-projects' ),
				'edit_item'          => __( 'Editar proyecto', 'gallegovela-projects' ),
				'all_items'          => __( 'Proyectos', 'gallegovela-projects' ),
				'search_items'       => __( 'Buscar proyectos', 'gallegovela-projects' ),
				'not_found'          => __( 'No se encontraron proyectos', 'gallegovela-projects' ),
			),
			'public'        => true,
			'show_in_rest'  => true,
			'rest_base'     => 'proyectos',
			'menu_icon'     => 'dashicons-portfolio',
			'has_archive'   => true,
			'rewrite'       => array( 'slug' => 'proyectos' ),
			'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'custom-fields' ),
		) );
	}
}
