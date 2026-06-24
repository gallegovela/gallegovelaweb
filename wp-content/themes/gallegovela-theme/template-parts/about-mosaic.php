<?php
/**
 * Sección "Qué hago": mosaico 2x2 con iconos PNG del diseño.
 * Sobretítulo, título y texto de sección desde CLAUDE.md.
 * Textos de tarjetas desde content.md.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gv_about_cards = array(
	array(
		'title' => __( 'Desarrollo de software', 'gallegovela-theme' ),
		'desc'  => __( 'Soluciones adaptadas a las necesidades de cada organización: desde páginas web corporativas hasta aplicaciones de gestión y plataformas de negocio.', 'gallegovela-theme' ),
		'icon'  => 'gallegovela_quehago_software.png',
		'alt'   => '',
	),
	array(
		'title' => __( 'DevOps y automatización', 'gallegovela-theme' ),
		'desc'  => __( 'Infraestructuras escalables, seguras y resilientes, utilizando tecnologías cloud modernas que faciliten la expansión de tu negocio.', 'gallegovela-theme' ),
		'icon'  => 'gallegovela_quehago_automatizaciones.png',
		'alt'   => '',
	),
	array(
		'title' => __( 'Arquitectura cloud', 'gallegovela-theme' ),
		'desc'  => __( 'Infraestructuras escalables, seguras y resilientes, utilizando tecnologías cloud modernas que faciliten la expansión de tu negocio.', 'gallegovela-theme' ),
		'icon'  => 'gallegovela_quehago_cloud.png',
		'alt'   => '',
	),
	array(
		'title' => __( 'Inteligencia artificial aplicada', 'gallegovela-theme' ),
		'desc'  => __( 'La integración de la IA generativa y el uso de modelos avanzados en productos, procesos y flujos de trabajo reales aceleran y optimizan el trabajo diario.', 'gallegovela-theme' ),
		'icon'  => 'gallegovela_quehago_ia.png',
		'alt'   => '',
	),
);
?>
<section id="sobre-mi" class="gv-about">
	<div class="gv-container">
		<div class="gv-section-header">
			<div class="gv-section-header__left">
				<h3 class="home-section-overtitle"><?php esc_html_e( 'Qué hago', 'gallegovela-theme' ); ?></h3>
				<h2 class="home-section-title"><?php esc_html_e( 'Diseño y construcción de soluciones software que generan impacto', 'gallegovela-theme' ); ?></h2>
			</div>
			<div class="gv-section-header__right">
				<p class="gv-section-header__text"><?php esc_html_e( 'Combino arquitectura, automatización e inteligencia artificial para crear sistemas escalables, eficientes y preparados para el futuro.', 'gallegovela-theme' ); ?></p>
			</div>
		</div>

		<div class="gv-about__grid">
			<?php foreach ( $gv_about_cards as $card ) : ?>
				<div class="gv-about__card">
					<div class="gv-about__icon" aria-hidden="true">
						<img
							src="<?php echo esc_url( GALLEGOVELA_THEME_URI . '/assets/images/' . $card['icon'] ); ?>"
							alt="<?php echo esc_attr( $card['alt'] ); ?>"
							width="320"
							height="320"
							loading="lazy"
						>
					</div>
					<h3 class="gv-about__title"><?php echo esc_html( $card['title'] ); ?></h3>
					<p class="gv-about__desc"><?php echo esc_html( $card['desc'] ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
