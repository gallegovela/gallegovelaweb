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
			<?php bloginfo( 'name' ); ?>
		</a>

		<button class="gv-header__toggle" id="gv-menu-toggle" aria-expanded="false" aria-controls="gv-primary-menu">
			<span class="screen-reader-text"><?php esc_html_e( 'Abrir menú', 'gallegovela-theme' ); ?></span>
			<span class="gv-header__toggle-bar"></span>
			<span class="gv-header__toggle-bar"></span>
			<span class="gv-header__toggle-bar"></span>
		</button>

		<nav class="gv-header__nav" id="gv-primary-menu" aria-label="<?php esc_attr_e( 'Menú principal', 'gallegovela-theme' ); ?>">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'gv-header__menu',
				'fallback_cb'    => 'gallegovela_primary_menu_fallback',
			) );
			?>
		</nav>
	</div>
</header>
