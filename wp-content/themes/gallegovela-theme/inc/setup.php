<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function gallegovela_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );

	load_theme_textdomain( 'gallegovela-theme', GALLEGOVELA_THEME_DIR . '/languages' );

	register_nav_menus( array(
		'primary'  => __( 'Menú principal (Home)', 'gallegovela-theme' ),
		'interior' => __( 'Menú páginas interiores', 'gallegovela-theme' ),
		'footer'   => __( 'Menú de pie de página', 'gallegovela-theme' ),
	) );

	add_image_size( 'gallegovela-card', 480, 320, true );

	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 1200; // alineado con el grid del theme, requerido por WPBakery.
	}
}
add_action( 'after_setup_theme', 'gallegovela_theme_setup' );

/**
 * Las Páginas de este theme (Sobre mí, Contacto, legales...) llevan HTML
 * pegado directamente en el editor (ver specs/pages/html/). wpautop
 * inserta <p> vacíos entre bloques separados por líneas en blanco,
 * rompiendo layouts de grid/flex. Se desactiva solo para Páginas; las
 * entradas del blog lo mantienen.
 */
function gallegovela_maybe_disable_wpautop() {
	if ( is_page() ) {
		remove_filter( 'the_content', 'wpautop' );
	}
}
add_action( 'wp', 'gallegovela_maybe_disable_wpautop' );

/**
 * Crea las páginas legales si no existen. Se ejecuta al activar el tema.
 */
function gallegovela_create_legal_pages() {
	$gv_legal_pages = array(
		array(
			'post_title' => 'Aviso Legal',
			'post_name'  => 'aviso-legal',
		),
		array(
			'post_title' => 'Política de Privacidad',
			'post_name'  => 'politica-privacidad',
		),
		array(
			'post_title' => 'Política de Cookies',
			'post_name'  => 'politica-cookies',
		),
		array(
			'post_title' => 'Accesibilidad',
			'post_name'  => 'accesibilidad',
		),
	);

	foreach ( $gv_legal_pages as $gv_page ) {
		if ( null === get_page_by_path( $gv_page['post_name'] ) ) {
			wp_insert_post( array(
				'post_title'  => $gv_page['post_title'],
				'post_name'   => $gv_page['post_name'],
				'post_status' => 'publish',
				'post_type'   => 'page',
			) );
		}
	}
}
add_action( 'after_switch_theme', 'gallegovela_create_legal_pages' );

/**
 * Garantiza que las páginas legales existen aunque el tema ya estuviera activo.
 * Usa una opción como flag para ejecutarse solo una vez.
 */
function gallegovela_maybe_create_legal_pages() {
	if ( get_option( 'gallegovela_legal_pages_created' ) ) {
		return;
	}
	gallegovela_create_legal_pages();
	update_option( 'gallegovela_legal_pages_created', true );
}
add_action( 'init', 'gallegovela_maybe_create_legal_pages' );

/**
 * Crea el menú principal de navegación si no existe y lo asigna a la ubicación 'primary'.
 */
function gallegovela_setup_primary_menu() {
	$gv_menu_name     = __( 'Menú principal', 'gallegovela-theme' );
	$gv_existing_menu = wp_get_nav_menu_object( $gv_menu_name );

	// Si el menú existe y tiene ítems, no hace falta recrearlo.
	if ( $gv_existing_menu && wp_get_nav_menu_items( $gv_existing_menu->term_id ) ) {
		return;
	}

	$gv_menu_id = $gv_existing_menu ? $gv_existing_menu->term_id : wp_create_nav_menu( $gv_menu_name );

	if ( is_wp_error( $gv_menu_id ) ) {
		return;
	}

	$gv_menu_items = array(
		array( 'title' => __( 'Qué hago', 'gallegovela-theme' ),  'url' => home_url( '/#que-hago' ) ),
		array( 'title' => __( 'Stack', 'gallegovela-theme' ),      'url' => home_url( '/#stack' ) ),
		array( 'title' => __( 'Proyectos', 'gallegovela-theme' ),  'url' => home_url( '/#proyectos-destacados' ) ),
		array( 'title' => __( 'Blog', 'gallegovela-theme' ),       'url' => home_url( '/#ultimas-entradas' ) ),
		array( 'title' => __( 'Contacto', 'gallegovela-theme' ),   'url' => home_url( '/contacto' ) ),
	);

	foreach ( $gv_menu_items as $gv_order => $gv_item ) {
		wp_update_nav_menu_item( $gv_menu_id, 0, array(
			'menu-item-title'  => $gv_item['title'],
			'menu-item-url'    => $gv_item['url'],
			'menu-item-status' => 'publish',
			'menu-item-position' => $gv_order + 1,
			'menu-item-type'   => 'custom',
		) );
	}

	$gv_locations            = get_theme_mod( 'nav_menu_locations', array() );
	$gv_locations['primary'] = $gv_menu_id;
	set_theme_mod( 'nav_menu_locations', $gv_locations );
}
add_action( 'init', 'gallegovela_setup_primary_menu' );

/**
 * Crea el menú de páginas interiores si no existe y lo asigna a la
 * ubicación 'interior'. A diferencia del menú de la Home (anclas a
 * secciones), este enlaza siempre a páginas completas.
 */
function gallegovela_setup_interior_menu() {
	$gv_menu_name     = __( 'Menú páginas interiores', 'gallegovela-theme' );
	$gv_existing_menu = wp_get_nav_menu_object( $gv_menu_name );

	// Si el menú existe y tiene ítems, no hace falta recrearlo.
	if ( $gv_existing_menu && wp_get_nav_menu_items( $gv_existing_menu->term_id ) ) {
		return;
	}

	$gv_menu_id = $gv_existing_menu ? $gv_existing_menu->term_id : wp_create_nav_menu( $gv_menu_name );

	if ( is_wp_error( $gv_menu_id ) ) {
		return;
	}

	$gv_menu_items = array(
		array( 'title' => __( 'Inicio', 'gallegovela-theme' ),     'url' => home_url( '/' ) ),
		array( 'title' => __( 'Sobre Mí', 'gallegovela-theme' ),   'url' => home_url( '/sobre-mi' ) ),
		array( 'title' => __( 'Proyectos', 'gallegovela-theme' ),  'url' => home_url( '/proyectos' ) ),
		array( 'title' => __( 'Blog', 'gallegovela-theme' ),       'url' => home_url( '/blog' ) ),
		array( 'title' => __( 'Contacto', 'gallegovela-theme' ),   'url' => home_url( '/contacto' ) ),
	);

	foreach ( $gv_menu_items as $gv_order => $gv_item ) {
		wp_update_nav_menu_item( $gv_menu_id, 0, array(
			'menu-item-title'    => $gv_item['title'],
			'menu-item-url'      => $gv_item['url'],
			'menu-item-status'   => 'publish',
			'menu-item-position' => $gv_order + 1,
			'menu-item-type'     => 'custom',
		) );
	}

	$gv_locations             = get_theme_mod( 'nav_menu_locations', array() );
	$gv_locations['interior'] = $gv_menu_id;
	set_theme_mod( 'nav_menu_locations', $gv_locations );
}
add_action( 'init', 'gallegovela_setup_interior_menu' );

/**
 * Importa las imágenes por defecto del tema al Media Library de WordPress
 * y vincula cada una a su theme_mod correspondiente.
 * Solo se ejecuta si el theme_mod aún no está configurado y el archivo existe.
 */
function gallegovela_setup_default_media() {
	$gv_default_images = array(
		'hero-background.png' => array( 'gallegovela_hero_background', 'Fondo del Hero'  ),
		'logo.png'            => array( 'gallegovela_header_logo',     'Logo Cabecera'   ),
		'logo-footer.png'     => array( 'gallegovela_footer_logo',     'Logo Footer'     ),
	);

	$gv_needs_import = false;
	foreach ( $gv_default_images as $gv_filename => $gv_data ) {
		if ( ! get_theme_mod( $gv_data[0] ) && file_exists( GALLEGOVELA_THEME_DIR . '/assets/images/' . $gv_filename ) ) {
			$gv_needs_import = true;
			break;
		}
	}

	if ( ! $gv_needs_import ) {
		return;
	}

	require_once ABSPATH . 'wp-admin/includes/image.php';
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';

	$gv_upload = wp_upload_dir();

	foreach ( $gv_default_images as $gv_filename => $gv_data ) {
		list( $gv_mod_key, $gv_title ) = $gv_data;

		if ( get_theme_mod( $gv_mod_key ) ) {
			continue;
		}

		$gv_source = GALLEGOVELA_THEME_DIR . '/assets/images/' . $gv_filename;

		if ( ! file_exists( $gv_source ) ) {
			continue;
		}

		$gv_dest = $gv_upload['path'] . '/' . $gv_filename;

		if ( ! copy( $gv_source, $gv_dest ) ) {
			continue;
		}

		$gv_filetype  = wp_check_filetype( $gv_filename );
		$gv_attach_id = wp_insert_attachment( array(
			'post_mime_type' => $gv_filetype['type'],
			'post_title'     => $gv_title,
			'post_status'    => 'inherit',
		), $gv_dest );

		if ( is_wp_error( $gv_attach_id ) ) {
			continue;
		}

		wp_update_attachment_metadata(
			$gv_attach_id,
			wp_generate_attachment_metadata( $gv_attach_id, $gv_dest )
		);

		set_theme_mod( $gv_mod_key, $gv_attach_id );
	}
}
add_action( 'init', 'gallegovela_setup_default_media' );

/**
 * Importa los logos de la sección Publicidad al Media Library.
 * Sus IDs quedan guardados en la opción gallegovela_publicidad_logo_ids
 * para que el footer los recupere con wp_get_attachment_image_url().
 */
function gallegovela_setup_publicidad_logos() {
	if ( get_option( 'gallegovela_publicidad_logo_ids' ) ) {
		return;
	}

	$gv_logos = array(
		'logo-eu.png'       => 'Publicidad — EU',
		'logo-gobierno.png' => 'Publicidad — Gobierno',
		'logo-kit.png'      => 'Publicidad — Kit Digital',
		'logo-red.png'      => 'Publicidad — Red',
		'logo-tr.png'       => 'Publicidad — TR',
	);

	require_once ABSPATH . 'wp-admin/includes/image.php';
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';

	$gv_upload = wp_upload_dir();
	$gv_ids    = array();

	foreach ( $gv_logos as $gv_filename => $gv_title ) {
		$gv_source = GALLEGOVELA_THEME_DIR . '/assets/images/publicidad/' . $gv_filename;

		if ( ! file_exists( $gv_source ) ) {
			continue;
		}

		$gv_dest = $gv_upload['path'] . '/' . $gv_filename;

		if ( ! copy( $gv_source, $gv_dest ) ) {
			continue;
		}

		$gv_filetype  = wp_check_filetype( $gv_filename );
		$gv_attach_id = wp_insert_attachment( array(
			'post_mime_type' => $gv_filetype['type'],
			'post_title'     => $gv_title,
			'post_status'    => 'inherit',
		), $gv_dest );

		if ( is_wp_error( $gv_attach_id ) ) {
			continue;
		}

		wp_update_attachment_metadata(
			$gv_attach_id,
			wp_generate_attachment_metadata( $gv_attach_id, $gv_dest )
		);

		$gv_ids[] = $gv_attach_id;
	}

	if ( ! empty( $gv_ids ) ) {
		update_option( 'gallegovela_publicidad_logo_ids', $gv_ids );
	}
}
add_action( 'init', 'gallegovela_setup_publicidad_logos' );

/**
 * Importa los iconos de la sección "Qué hago" al Media Library
 * y los vincula a sus theme_mods para el Customizer.
 * Solo se ejecuta si algún theme_mod no está configurado y el archivo existe.
 */
function gallegovela_setup_quehago_icons() {
	$gv_icons = array(
		'gallegovela_quehago_software'         => 'Qué hago — Desarrollo de software',
		'gallegovela_quehago_automatizaciones'  => 'Qué hago — DevOps y automatización',
		'gallegovela_quehago_cloud'             => 'Qué hago — Arquitectura cloud',
		'gallegovela_quehago_ia'               => 'Qué hago — Inteligencia artificial',
	);

	$gv_needs_import = false;
	foreach ( $gv_icons as $gv_key => $gv_title ) {
		if ( ! get_theme_mod( $gv_key ) && file_exists( GALLEGOVELA_THEME_DIR . '/assets/images/' . $gv_key . '.png' ) ) {
			$gv_needs_import = true;
			break;
		}
	}

	if ( ! $gv_needs_import ) {
		return;
	}

	require_once ABSPATH . 'wp-admin/includes/image.php';
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';

	$gv_upload = wp_upload_dir();

	foreach ( $gv_icons as $gv_key => $gv_title ) {
		if ( get_theme_mod( $gv_key ) ) {
			continue;
		}

		$gv_filename = $gv_key . '.png';
		$gv_source   = GALLEGOVELA_THEME_DIR . '/assets/images/' . $gv_filename;

		if ( ! file_exists( $gv_source ) ) {
			continue;
		}

		$gv_dest = $gv_upload['path'] . '/' . $gv_filename;

		if ( ! copy( $gv_source, $gv_dest ) ) {
			continue;
		}

		$gv_attach_id = wp_insert_attachment( array(
			'post_mime_type' => 'image/png',
			'post_title'     => $gv_title,
			'post_status'    => 'inherit',
		), $gv_dest );

		if ( is_wp_error( $gv_attach_id ) ) {
			continue;
		}

		wp_update_attachment_metadata(
			$gv_attach_id,
			wp_generate_attachment_metadata( $gv_attach_id, $gv_dest )
		);

		set_theme_mod( $gv_key, $gv_attach_id );
	}
}
add_action( 'init', 'gallegovela_setup_quehago_icons' );

/**
 * /blog es una plantilla del tema, no una Página de WordPress: se enruta
 * mediante rewrite rule + template_include, sin crear un post_type 'page'.
 */
function gallegovela_register_blog_rewrite() {
	add_rewrite_rule( '^blog/?$', 'index.php?gv_blog_page=1', 'top' );
}
add_action( 'init', 'gallegovela_register_blog_rewrite' );

function gallegovela_blog_query_vars( $gv_vars ) {
	$gv_vars[] = 'gv_blog_page';
	return $gv_vars;
}
add_filter( 'query_vars', 'gallegovela_blog_query_vars' );

function gallegovela_blog_parse_query( $gv_query ) {
	if ( $gv_query->is_main_query() && $gv_query->get( 'gv_blog_page' ) ) {
		$gv_query->is_home = false;
		$gv_query->is_404  = false;
		$gv_query->is_page = true;
	}
}
add_action( 'parse_query', 'gallegovela_blog_parse_query' );

function gallegovela_blog_template_include( $gv_template ) {
	if ( get_query_var( 'gv_blog_page' ) ) {
		$gv_custom = GALLEGOVELA_THEME_DIR . '/template-blog.php';
		if ( file_exists( $gv_custom ) ) {
			return $gv_custom;
		}
	}
	return $gv_template;
}
add_filter( 'template_include', 'gallegovela_blog_template_include' );

/**
 * La rewrite rule de /blog necesita un flush para que Apache/WP la reconozca.
 * Se ejecuta una sola vez (flag en options) en vez de en cada request.
 */
function gallegovela_maybe_flush_rewrite_rules() {
	if ( get_option( 'gallegovela_rewrite_flushed_v1' ) ) {
		return;
	}
	gallegovela_register_blog_rewrite();
	flush_rewrite_rules();
	update_option( 'gallegovela_rewrite_flushed_v1', true );
}
add_action( 'init', 'gallegovela_maybe_flush_rewrite_rules', 20 );
