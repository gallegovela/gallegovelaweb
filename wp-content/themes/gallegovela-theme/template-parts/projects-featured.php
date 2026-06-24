<?php
/**
 * Proyectos destacados: datos vía gallegovela_get_featured_projects() (plugin).
 * La sección siempre se renderiza; si no hay proyectos muestra un estado vacío.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gv_proyectos = function_exists( 'gallegovela_get_featured_projects' )
	? gallegovela_get_featured_projects( 3 )
	: array();
?>
<section id="proyectos-destacados" class="gv-projects">
	<div class="gv-container">
		<div class="gv-section-header">
			<div class="gv-section-header__left">
				<h3 class="home-section-overtitle"><?php esc_html_e( 'Proyectos', 'gallegovela-theme' ); ?></h3>
				<h2 class="home-section-title"><?php esc_html_e( 'Algunos proyectos en los que he trabajado', 'gallegovela-theme' ); ?></h2>
			</div>
			<div class="gv-section-header__right">
				<a class="gv-section-header__link" href="<?php echo esc_url( home_url( '/proyectos' ) ); ?>"><?php esc_html_e( 'Ver Todos', 'gallegovela-theme' ); ?></a>
			</div>
		</div>

		<?php if ( ! empty( $gv_proyectos ) ) : ?>
			<div class="gv-projects__grid">
				<?php foreach ( $gv_proyectos as $gv_proyecto ) : ?>
					<?php gallegovela_render_project_card( $gv_proyecto ); ?>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<p class="gv-projects__empty"><?php esc_html_e( 'Próximamente.', 'gallegovela-theme' ); ?></p>
		<?php endif; ?>
	</div>
</section>
