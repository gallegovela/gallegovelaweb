<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gv_logo_id  = (int) get_theme_mod( 'gallegovela_footer_logo', 0 );
$gv_logo_url = $gv_logo_id > 0 ? wp_get_attachment_image_url( $gv_logo_id, 'medium' ) : '';
$gv_linkedin = esc_url( get_theme_mod( 'gallegovela_footer_linkedin', '' ) );
$gv_twitter  = esc_url( get_theme_mod( 'gallegovela_footer_x', '' ) );
$gv_github   = esc_url( get_theme_mod( 'gallegovela_footer_github', '' ) );
?>
<div class="gv-footer__columns">

	<div class="gv-footer__col gv-footer__col--branding">
		<a class="gv-footer__logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php if ( $gv_logo_url ) : ?>
				<img class="gv-footer__logo-img" src="<?php echo esc_url( $gv_logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>">
			<?php else : ?>
				<span class="gv-footer__logo"><?php bloginfo( 'name' ); ?></span>
			<?php endif; ?>
		</a>

		<p class="gv-footer__name">Manuel Jesús Gallego Vela</p>
		<p class="gv-footer__role">Ingeniería del Software, Cloud, DevOps, IA</p>

		<?php if ( $gv_linkedin || $gv_twitter || $gv_github ) : ?>
		<div class="gv-footer__rrss">
			<?php if ( $gv_linkedin ) : ?>
				<a class="gv-footer__rrss-link" href="<?php echo $gv_linkedin; ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'LinkedIn', 'gallegovela-theme' ); ?>">
					<?php get_template_part( 'template-parts/icons/icon', null, array( 'icon' => 'linkedin' ) ); ?>
				</a>
			<?php endif; ?>
			<?php if ( $gv_twitter ) : ?>
				<a class="gv-footer__rrss-link" href="<?php echo $gv_twitter; ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'X', 'gallegovela-theme' ); ?>">
					<?php get_template_part( 'template-parts/icons/icon', null, array( 'icon' => 'x' ) ); ?>
				</a>
			<?php endif; ?>
			<?php if ( $gv_github ) : ?>
				<a class="gv-footer__rrss-link" href="<?php echo $gv_github; ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'GitHub', 'gallegovela-theme' ); ?>">
					<?php get_template_part( 'template-parts/icons/icon', null, array( 'icon' => 'github' ) ); ?>
				</a>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	</div>

	<div class="gv-footer__col">
		<h3 class="gv-footer__col-title"><?php esc_html_e( 'Navegación', 'gallegovela-theme' ); ?></h3>
		<ul class="gv-footer__list">
			<li><a href="<?php echo esc_url( home_url( '/sobre-mi' ) ); ?>"><?php esc_html_e( 'Servicios y CV', 'gallegovela-theme' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/proyectos' ) ); ?>"><?php esc_html_e( 'Proyectos', 'gallegovela-theme' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>"><?php esc_html_e( 'Blog', 'gallegovela-theme' ); ?></a></li>
		</ul>
	</div>

	<div class="gv-footer__col">
		<h3 class="gv-footer__col-title"><?php esc_html_e( 'Enlaces de interés', 'gallegovela-theme' ); ?></h3>
		<ul class="gv-footer__list">
			<li><a href="<?php echo esc_url( home_url( '/aviso-legal' ) ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Aviso Legal', 'gallegovela-theme' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/politica-privacidad' ) ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Política de Privacidad', 'gallegovela-theme' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/politica-cookies' ) ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Política de Cookies', 'gallegovela-theme' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url( '/accesibilidad' ) ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Accesibilidad', 'gallegovela-theme' ); ?></a></li>
		</ul>
	</div>

	<div class="gv-footer__col">
		<h3 class="gv-footer__col-title"><?php esc_html_e( 'Contacto', 'gallegovela-theme' ); ?></h3>
		<p class="gv-footer__address"><?php esc_html_e( 'Centro Tecnológico FEVAL, Paseo de FEVAL, s/n, 06400 Don Benito (Badajoz - España)', 'gallegovela-theme' ); ?></p>
		<a class="gv-button gv-button--primary" href="<?php echo esc_url( home_url( '/contacto' ) ); ?>">
			<?php esc_html_e( 'Hablemos', 'gallegovela-theme' ); ?>
		</a>
	</div>

</div>
