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

	case 'pin':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<path d="M32 4a18 18 0 0 1 18 18c0 12-18 38-18 38S14 34 14 22A18 18 0 0 1 32 4Z"/>
			<circle cx="32" cy="22" r="6"/>
		</svg>
		<?php
		break;

	case 'laptop':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<rect x="8" y="12" width="48" height="30" rx="3"/>
			<path d="M4 50h56"/>
			<path d="M22 50l3 4h18l3-4"/>
		</svg>
		<?php
		break;

	case 'clock':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<circle cx="32" cy="32" r="26"/>
			<path d="M32 16v18l10 6"/>
		</svg>
		<?php
		break;

	case 'shield':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<path d="M32 6L8 16v18c0 14 10 24 24 26 14-2 24-12 24-26V16Z"/>
			<path d="M22 32l7 7 13-13"/>
		</svg>
		<?php
		break;

	case 'user-card':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<circle cx="32" cy="22" r="12"/>
			<path d="M10 56c0-12 9-20 22-20s22 8 22 20"/>
		</svg>
		<?php
		break;

	case 'rocket':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<path d="M32 8c8 8 12 20 8 34l-8 8-8-8c-4-14 0-26 8-34Z"/>
			<circle cx="32" cy="26" r="5"/>
			<path d="M20 46l-8 8M44 46l8 8"/>
		</svg>
		<?php
		break;

	case 'users':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<circle cx="24" cy="20" r="10"/>
			<path d="M6 54c0-10 7-17 18-17s18 7 18 17"/>
			<circle cx="46" cy="22" r="8"/>
			<path d="M38 54c2-8 8-13 16-13"/>
		</svg>
		<?php
		break;

	case 'book':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<path d="M32 10C22 10 14 14 14 14v36s8-4 18-4 18 4 18 4V14s-8-4-18-4Z"/>
			<path d="M32 10v36"/>
		</svg>
		<?php
		break;

	case 'search':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<circle cx="28" cy="28" r="18"/>
			<path d="M42 42L56 56"/>
		</svg>
		<?php
		break;

	case 'pencil':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<path d="M44 8l12 12-32 32-14 2 2-14Z"/>
			<path d="M40 12l12 12"/>
		</svg>
		<?php
		break;

	case 'code':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<path d="M22 20L10 32l12 12"/>
			<path d="M42 20l12 12-12 12"/>
			<path d="M38 14L26 50"/>
		</svg>
		<?php
		break;

	case 'chart':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<path d="M8 56h48"/>
			<rect x="14" y="36" width="10" height="20"/>
			<rect x="28" y="22" width="10" height="34"/>
			<rect x="42" y="10" width="10" height="46"/>
		</svg>
		<?php
		break;

	case 'briefcase':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<rect x="6" y="22" width="52" height="36" rx="4"/>
			<path d="M22 22V16a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v6"/>
			<path d="M6 40h52"/>
		</svg>
		<?php
		break;

	case 'bolt':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<path d="M36 6L14 36h18l-4 22 22-30H32Z"/>
		</svg>
		<?php
		break;

	case 'audit':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<rect x="12" y="12" width="40" height="48" rx="4"/>
			<path d="M22 12V8a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v4"/>
			<path d="M20 34l8 8 16-16"/>
		</svg>
		<?php
		break;

	case 'envelope':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<rect x="6" y="16" width="52" height="36" rx="4"/>
			<path d="M6 18l26 18 26-18"/>
		</svg>
		<?php
		break;

	case 'calendar':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<rect x="8" y="12" width="48" height="48" rx="4"/>
			<path d="M8 26h48"/>
			<path d="M20 8v8M44 8v8"/>
			<circle cx="22" cy="40" r="2" fill="currentColor" stroke="none"/>
			<circle cx="32" cy="40" r="2" fill="currentColor" stroke="none"/>
			<circle cx="42" cy="40" r="2" fill="currentColor" stroke="none"/>
		</svg>
		<?php
		break;

	case 'linkedin':
		?>
		<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
			<path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
		</svg>
		<?php
		break;

	case 'x':
		?>
		<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
			<path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.747l7.73-8.835L1.254 2.25H8.08l4.258 5.635L18.244 2.25zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77z"/>
		</svg>
		<?php
		break;

	case 'github':
		?>
		<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
			<path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
		</svg>
		<?php
		break;

	case 'lock':
		?>
		<svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
			<rect x="12" y="28" width="40" height="30" rx="4"/>
			<path d="M22 28V20a10 10 0 0 1 20 0v8"/>
			<circle cx="32" cy="44" r="4"/>
		</svg>
		<?php
		break;
}
