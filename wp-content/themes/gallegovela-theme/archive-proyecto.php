<?php get_header(); ?>

<main id="primary" class="gv-projects-archive">
	<div class="gv-container">
		<h1 class="gv-page__title"><?php esc_html_e( 'Proyectos', 'gallegovela-theme' ); ?></h1>

		<?php
		$gv_tipos = get_terms( array(
			'taxonomy'   => 'tipo_proyecto',
			'hide_empty' => true,
		) );

		if ( ! empty( $gv_tipos ) && ! is_wp_error( $gv_tipos ) ) :
			?>
			<nav class="gv-projects-archive__filters" aria-label="<?php esc_attr_e( 'Filtrar por tipo de proyecto', 'gallegovela-theme' ); ?>">
				<a class="gv-badge" href="<?php echo esc_url( get_post_type_archive_link( 'proyecto' ) ); ?>"><?php esc_html_e( 'Todos', 'gallegovela-theme' ); ?></a>
				<?php foreach ( $gv_tipos as $gv_tipo ) : ?>
					<a class="gv-badge" href="<?php echo esc_url( get_term_link( $gv_tipo ) ); ?>"><?php echo esc_html( $gv_tipo->name ); ?></a>
				<?php endforeach; ?>
			</nav>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>
			<div class="gv-projects__grid">
				<?php
				while ( have_posts() ) :
					the_post();
					gallegovela_render_project_card( get_post() );
				endwhile;
				?>
			</div>

			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'Todavía no hay proyectos publicados.', 'gallegovela-theme' ); ?></p>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>
