<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Devuelve $limit proyectos para la Home: destacados primero, después por
 * fecha de proyecto descendente. Si hay menos de $limit destacados, se
 * completa con los no destacados más recientes (nunca queda incompleta).
 */
function gallegovela_get_featured_projects( $limit = 3 ) {
	$query = new WP_Query( array(
		'post_type'      => Gallegovela_CPT_Proyecto::POST_TYPE,
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'no_found_rows'  => true,
	) );

	$proyectos = $query->posts;

	usort( $proyectos, function ( $a, $b ) {
		$destacado_a = gallegovela_get_proyecto_destacado( $a->ID ) ? 1 : 0;
		$destacado_b = gallegovela_get_proyecto_destacado( $b->ID ) ? 1 : 0;

		if ( $destacado_a !== $destacado_b ) {
			return $destacado_b - $destacado_a;
		}

		return strcmp( gallegovela_get_proyecto_fecha( $b->ID ), gallegovela_get_proyecto_fecha( $a->ID ) );
	} );

	return array_slice( $proyectos, 0, $limit );
}

function gallegovela_get_proyecto_cliente( $post_id ) {
	return get_post_meta( $post_id, Gallegovela_Proyecto_Meta::META_CLIENTE, true );
}

function gallegovela_get_proyecto_fecha( $post_id ) {
	return get_post_meta( $post_id, Gallegovela_Proyecto_Meta::META_FECHA, true );
}

function gallegovela_get_proyecto_url( $post_id ) {
	return get_post_meta( $post_id, Gallegovela_Proyecto_Meta::META_URL, true );
}

function gallegovela_get_proyecto_destacado( $post_id ) {
	return '1' === get_post_meta( $post_id, Gallegovela_Proyecto_Meta::META_DESTACADO, true );
}

function gallegovela_get_proyecto_galeria( $post_id ) {
	$ids = (array) get_post_meta( $post_id, Gallegovela_Proyecto_Meta::META_GALERIA, true );

	return array_values( array_filter( array_map( 'absint', $ids ) ) );
}
