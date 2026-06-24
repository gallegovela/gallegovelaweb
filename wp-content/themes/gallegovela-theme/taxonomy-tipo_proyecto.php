<?php get_header(); ?>

<main id="primary" class="gv-projects-archive">
	<div class="gv-container">
		<h1 class="gv-page__title"><?php single_term_title(); ?></h1>

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
			<p><?php esc_html_e( 'No hay proyectos de este tipo todavía.', 'gallegovela-theme' ); ?></p>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>
