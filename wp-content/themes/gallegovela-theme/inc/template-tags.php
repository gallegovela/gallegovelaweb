<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function gallegovela_render_project_card( $proyecto ) {
	get_template_part( 'template-parts/cards/project-card', null, array( 'proyecto' => $proyecto ) );
}

function gallegovela_render_post_card( $post ) {
	get_template_part( 'template-parts/cards/post-card', null, array( 'post' => $post ) );
}

/**
 * Menú de cabecera por defecto cuando no hay ninguno asignado en WP Admin.
 * Los enlaces y el orden provienen de content.md.
 */
function gallegovela_primary_menu_fallback() {
	$items = array(
		array( 'label' => __( 'Sobre mí', 'gallegovela-theme' ),  'href' => home_url( '/sobre-mi' ) ),
		array( 'label' => __( 'Stack', 'gallegovela-theme' ),      'href' => home_url( '/#stack' ) ),
		array( 'label' => __( 'Proyectos', 'gallegovela-theme' ),  'href' => home_url( '/#proyectos-destacados' ) ),
		array( 'label' => __( 'Blog', 'gallegovela-theme' ),       'href' => home_url( '/#ultimas-entradas' ) ),
		array( 'label' => __( 'Contacto', 'gallegovela-theme' ),   'href' => home_url( '/contacto' ) ),
	);

	echo '<ul class="gv-header__menu">';
	foreach ( $items as $item ) {
		printf(
			'<li><a href="%s">%s</a></li>',
			esc_url( $item['href'] ),
			esc_html( $item['label'] )
		);
	}
	echo '</ul>';
}

function gallegovela_tecnologia_badges( $post_id ) {
	$terms = get_the_terms( $post_id, 'tecnologia' );

	if ( empty( $terms ) || is_wp_error( $terms ) ) {
		return '';
	}

	$badges = array_map( function ( $term ) {
		return '<span class="gv-badge">' . esc_html( $term->name ) . '</span>';
	}, $terms );

	return implode( '', $badges );
}
