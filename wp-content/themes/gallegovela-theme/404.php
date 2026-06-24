<?php get_header(); ?>

<main id="primary" class="gv-404">
	<div class="gv-container">
		<h1 class="gv-page__title"><?php esc_html_e( 'Página no encontrada', 'gallegovela-theme' ); ?></h1>
		<p><?php esc_html_e( 'El contenido que buscas no existe o se ha movido.', 'gallegovela-theme' ); ?></p>
		<a class="gv-button gv-button--primary" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Volver al inicio', 'gallegovela-theme' ); ?></a>
	</div>
</main>

<?php get_footer(); ?>
