<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Gallegovela_Rest_Api {

	const NAMESPACE = 'gallegovela/v1';

	private static $instance = null;

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		add_action( 'rest_api_init', array( $this, 'register_routes' ) );
	}

	public function register_routes() {
		register_rest_route( self::NAMESPACE, '/proyectos/destacados', array(
			'methods'             => WP_REST_Server::READABLE,
			'callback'            => array( $this, 'get_destacados' ),
			'permission_callback' => '__return_true',
			'args'                => array(
				'limite' => array(
					'default'           => 3,
					'sanitize_callback' => 'absint',
				),
			),
		) );
	}

	public function get_destacados( WP_REST_Request $request ) {
		$proyectos = gallegovela_get_featured_projects( $request->get_param( 'limite' ) );

		$data = array_map( function ( $proyecto ) {
			return array(
				'id'        => $proyecto->ID,
				'title'     => get_the_title( $proyecto ),
				'excerpt'   => get_the_excerpt( $proyecto ),
				'permalink' => get_permalink( $proyecto ),
				'thumbnail' => get_the_post_thumbnail_url( $proyecto, 'medium' ),
				'cliente'   => gallegovela_get_proyecto_cliente( $proyecto->ID ),
				'fecha'     => gallegovela_get_proyecto_fecha( $proyecto->ID ),
				'url'       => gallegovela_get_proyecto_url( $proyecto->ID ),
			);
		}, $proyectos );

		return rest_ensure_response( $data );
	}
}
