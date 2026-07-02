<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="site-header" class="gv-header">
	<div class="gv-container gv-header__inner">
		<a class="gv-header__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php
			$gv_header_logo_id  = (int) get_theme_mod( 'gallegovela_header_logo', 0 );
			$gv_header_logo_url = $gv_header_logo_id > 0 ? wp_get_attachment_image_url( $gv_header_logo_id, 'full' ) : '';
			if ( $gv_header_logo_url ) :
			?>
				<img src="<?php echo esc_url( $gv_header_logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>" class="gv-header__logo-img">
			<?php else : ?>
				<?php bloginfo( 'name' ); ?>
			<?php endif; ?>
		</a>

		<button class="gv-header__toggle" id="gv-menu-toggle" aria-expanded="false" aria-controls="gv-primary-menu">
			<span class="screen-reader-text"><?php esc_html_e( 'Abrir menú', 'gallegovela-theme' ); ?></span>
			<span class="gv-header__toggle-bar"></span>
			<span class="gv-header__toggle-bar"></span>
			<span class="gv-header__toggle-bar"></span>
		</button>

		<nav class="gv-header__nav" id="gv-primary-menu" aria-label="<?php esc_attr_e( 'Menú principal', 'gallegovela-theme' ); ?>">
			<?php
			// La Home usa anclas a sus propias secciones; el resto de páginas
			// (Sobre mí, Proyectos, Blog, Contacto...) usa un menú de páginas completas.
			$gv_is_interior = ! is_front_page();

			wp_nav_menu( array(
				'theme_location' => $gv_is_interior ? 'interior' : 'primary',
				'container'      => false,
				'menu_class'     => 'gv-header__menu',
				'fallback_cb'    => $gv_is_interior ? 'gallegovela_interior_menu_fallback' : 'gallegovela_primary_menu_fallback',
			) );
			?>
		</nav>
	</div>
</header>
