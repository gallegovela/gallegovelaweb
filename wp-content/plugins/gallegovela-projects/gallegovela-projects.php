<?php
/**
 * Plugin Name: GallegoVela Projects
 * Plugin URI: https://gallegovela.es
 * Description: CPT Proyecto, taxonomías, metadatos y API de consulta para gallegovela.es.
 * Version: 0.1.0
 * Author: Gallegovela
 * Text Domain: gallegovela-projects
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'GV_PROJECTS_VERSION', '0.1.0' );
define( 'GV_PROJECTS_DIR', plugin_dir_path( __FILE__ ) );
define( 'GV_PROJECTS_URL', plugin_dir_url( __FILE__ ) );

require_once GV_PROJECTS_DIR . 'includes/class-plugin.php';
require_once GV_PROJECTS_DIR . 'includes/cpt/class-cpt-proyecto.php';
require_once GV_PROJECTS_DIR . 'includes/taxonomies/class-taxonomy-tipo.php';
require_once GV_PROJECTS_DIR . 'includes/taxonomies/class-taxonomy-tecnologia.php';
require_once GV_PROJECTS_DIR . 'includes/meta/class-proyecto-meta.php';
require_once GV_PROJECTS_DIR . 'includes/shortcodes/class-shortcodes.php';
require_once GV_PROJECTS_DIR . 'includes/rest/class-rest-api.php';
require_once GV_PROJECTS_DIR . 'includes/helpers.php';
require_once GV_PROJECTS_DIR . 'includes/blog-helpers.php';

Gallegovela_Projects_Plugin::instance();
