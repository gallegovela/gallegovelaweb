<?php
/**
 * Hero de la Home. Copy real desde specs/pages/home.md.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gv_hero_highlights = array(
	__( 'Enfoque end-to-end', 'gallegovela-theme' ),
	__( 'Cloud & DevOps', 'gallegovela-theme' ),
	__( 'IA aplicada', 'gallegovela-theme' ),
	__( 'Resultados reales', 'gallegovela-theme' ),
);
?>
<section class="gv-hero" style="background-image:url('<?php echo esc_url( gallegovela_get_hero_background_url() ); ?>');">
	<div class="gv-hero__overlay">
		<div class="gv-container gv-hero__inner">
			<div class="gv-hero__content">
				<p class="gv-hero__eyebrow"><?php esc_html_e( '/ Ingeniero Informático', 'gallegovela-theme' ); ?></p>
				<h1 class="gv-hero__title"><?php echo esc_html__( 'INGENIERÍA DEL SOFTWARE', 'gallegovela-theme' ); ?><br><?php echo esc_html__( 'DEVOPS & CLOUD', 'gallegovela-theme' ); ?><br><?php echo esc_html__( 'INTELIGENCIA ARTIFICIAL', 'gallegovela-theme' ); ?></h1>
				<h5 class="gv-hero__subtitle">
					<?php esc_html_e( 'Diseño y construcción de plataformas escalables, automatización de sistemas complejos, integración de inteligencia artificial en entornos reales.', 'gallegovela-theme' ); ?>
				</h5>
				<div class="gv-hero__actions">
					<a class="gv-button gv-button--primary" href="<?php echo esc_url( home_url( '/sobre-mi' ) ); ?>"><?php esc_html_e( 'Sobre mí', 'gallegovela-theme' ); ?></a>
					<a class="gv-button gv-button--secondary" href="#proyectos-destacados"><?php esc_html_e( 'Proyectos', 'gallegovela-theme' ); ?></a>
				</div>
				<ul class="gv-hero__highlights">
					<?php foreach ( $gv_hero_highlights as $gv_highlight ) : ?>
						<li class="gv-badge"><?php echo esc_html( $gv_highlight ); ?></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<div class="gv-hero__visual" aria-hidden="true"></div>
		</div>
	</div>
</section>
