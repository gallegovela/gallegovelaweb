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
		array( 'label' => __( 'Qué hago', 'gallegovela-theme' ), 'href' => home_url( '/#que-hago' ) ),
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

/**
 * Menú de cabecera para páginas interiores (todo excepto la Home), cuando
 * no hay ninguno asignado en WP Admin. A diferencia del menú de la Home,
 * enlaza siempre a páginas completas, no a anclas de sección.
 */
function gallegovela_interior_menu_fallback() {
	$items = array(
		array( 'label' => __( 'Inicio', 'gallegovela-theme' ),     'href' => home_url( '/' ) ),
		array( 'label' => __( 'Sobre Mí', 'gallegovela-theme' ),   'href' => home_url( '/sobre-mi' ) ),
		array( 'label' => __( 'Proyectos', 'gallegovela-theme' ),  'href' => home_url( '/proyectos' ) ),
		array( 'label' => __( 'Blog', 'gallegovela-theme' ),       'href' => home_url( '/blog' ) ),
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

/**
 * Fecha en español ("1 de julio de 2026"), sin depender del locale activo
 * en WordPress (el sitio no tiene configurado es_ES).
 */
function gallegovela_format_date_es( $post ) {
	$meses = array(
		1  => 'enero',
		2  => 'febrero',
		3  => 'marzo',
		4  => 'abril',
		5  => 'mayo',
		6  => 'junio',
		7  => 'julio',
		8  => 'agosto',
		9  => 'septiembre',
		10 => 'octubre',
		11 => 'noviembre',
		12 => 'diciembre',
	);

	$dia = get_the_date( 'j', $post );
	$mes = $meses[ (int) get_the_date( 'n', $post ) ];
	$ano = get_the_date( 'Y', $post );

	return sprintf( '%s de %s de %s', $dia, $mes, $ano );
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
