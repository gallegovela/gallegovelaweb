<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Carga dinámica (scroll) de la cuadrícula de /proyectos.
 */
function gallegovela_ajax_load_projects() {
	check_ajax_referer( 'gallegovela_catalog', 'nonce' );

	$gv_offset = isset( $_POST['offset'] ) ? max( 0, (int) $_POST['offset'] ) : 0;
	$gv_batch  = 9;

	$gv_query = new WP_Query( array(
		'post_type'      => 'proyecto',
		'post_status'    => 'publish',
		'posts_per_page' => $gv_batch,
		'offset'         => $gv_offset,
		'orderby'        => array( 'menu_order' => 'ASC', 'date' => 'DESC' ),
	) );

	ob_start();
	foreach ( $gv_query->posts as $gv_proyecto ) {
		gallegovela_render_project_card( $gv_proyecto );
	}
	$gv_html = ob_get_clean();

	$gv_loaded = min( $gv_offset + count( $gv_query->posts ), $gv_query->found_posts );

	wp_send_json_success( array(
		'html'    => $gv_html,
		'loaded'  => $gv_loaded,
		'total'   => $gv_query->found_posts,
		'hasMore' => $gv_loaded < $gv_query->found_posts,
	) );
}
add_action( 'wp_ajax_gallegovela_load_projects', 'gallegovela_ajax_load_projects' );
add_action( 'wp_ajax_nopriv_gallegovela_load_projects', 'gallegovela_ajax_load_projects' );

/**
 * Carga dinámica (scroll + filtros) de la lista de /blog.
 */
function gallegovela_ajax_load_posts() {
	check_ajax_referer( 'gallegovela_catalog', 'nonce' );

	$gv_offset     = isset( $_POST['offset'] ) ? max( 0, (int) $_POST['offset'] ) : 0;
	$gv_batch      = 5;
	$gv_search     = isset( $_POST['search'] ) ? sanitize_text_field( wp_unslash( $_POST['search'] ) ) : '';
	$gv_categories = isset( $_POST['categories'] ) ? array_filter( array_map( 'absint', (array) $_POST['categories'] ) ) : array();
	$gv_tags       = isset( $_POST['tags'] ) ? array_filter( array_map( 'absint', (array) $_POST['tags'] ) ) : array();

	$gv_args = array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => $gv_batch,
		'offset'         => $gv_offset,
		'orderby'        => 'date',
		'order'          => 'DESC',
	);

	if ( '' !== $gv_search ) {
		$gv_args['s'] = $gv_search;
	}

	$gv_tax_query = array();

	if ( ! empty( $gv_categories ) ) {
		$gv_tax_query[] = array(
			'taxonomy' => 'category',
			'field'    => 'term_id',
			'terms'    => $gv_categories,
		);
	}

	if ( ! empty( $gv_tags ) ) {
		$gv_tax_query[] = array(
			'taxonomy' => 'post_tag',
			'field'    => 'term_id',
			'terms'    => $gv_tags,
		);
	}

	if ( ! empty( $gv_tax_query ) ) {
		if ( count( $gv_tax_query ) > 1 ) {
			$gv_tax_query['relation'] = 'AND';
		}
		$gv_args['tax_query'] = $gv_tax_query; // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
	}

	$gv_query = new WP_Query( $gv_args );

	$gv_render_blog_card = function_exists( 'gallegovela_render_blog_card' )
		? 'gallegovela_render_blog_card'
		: 'gallegovela_render_post_card';

	ob_start();
	foreach ( $gv_query->posts as $gv_post ) {
		call_user_func( $gv_render_blog_card, $gv_post );
	}
	$gv_html = ob_get_clean();

	$gv_loaded = min( $gv_offset + count( $gv_query->posts ), $gv_query->found_posts );

	wp_send_json_success( array(
		'html'    => $gv_html,
		'loaded'  => $gv_loaded,
		'total'   => $gv_query->found_posts,
		'hasMore' => $gv_loaded < $gv_query->found_posts,
	) );
}
add_action( 'wp_ajax_gallegovela_load_posts', 'gallegovela_ajax_load_posts' );
add_action( 'wp_ajax_nopriv_gallegovela_load_posts', 'gallegovela_ajax_load_posts' );
