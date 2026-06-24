<?php
/**
 * Icono SVG inline. Recibe $args['icon'] con uno de: layers, nodes, cloud, brain.
 * Trazo monolínea, coincide con design/about-icons.png.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gv_icon = isset( $args['icon'] ) ? $args['icon'] : '';

switch ( $gv_icon ) {

	case 'layers':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<path d="M32 8 58 22 32 36 6 22Z" />
			<path d="M6 32 32 46 58 32" />
			<path d="M6 42 32 56 58 42" />
		</svg>
		<?php
		break;

	case 'nodes':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<rect x="28" y="28" width="8" height="8" fill="currentColor" stroke="none" />
			<rect x="6" y="6" width="10" height="10" />
			<rect x="48" y="6" width="10" height="10" />
			<rect x="6" y="48" width="10" height="10" />
			<rect x="48" y="48" width="10" height="10" />
			<path d="M16 16 28 28M48 16 36 28M16 48 28 36M48 48 36 36" />
		</svg>
		<?php
		break;

	case 'cloud':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<path d="M20 34a10 10 0 1 1 1.5-19.9A12 12 0 0 1 44 18a9 9 0 0 1-1 17.9H20Z" />
			<rect x="20" y="40" width="24" height="16" rx="2" />
			<path d="M26 48h2M26 52h6" />
		</svg>
		<?php
		break;

	case 'brain':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<path d="M32 12c-7 0-12 5-12 11 0 3 1 5 3 7-2 2-3 4-3 7 0 6 5 11 12 11s12-5 12-11" />
			<path d="M32 12v33" />
			<circle cx="50" cy="20" r="2" fill="currentColor" stroke="none" />
			<circle cx="54" cy="30" r="2" fill="currentColor" stroke="none" />
			<circle cx="50" cy="40" r="2" fill="currentColor" stroke="none" />
			<path d="M32 20h14M32 30h18M32 40h14" />
		</svg>
		<?php
		break;
}
