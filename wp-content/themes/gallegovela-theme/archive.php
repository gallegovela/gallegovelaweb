<?php get_header(); ?>

<main id="primary" class="gv-blog-archive">
	<div class="gv-container">
		<header class="gv-page__header">
			<h1 class="gv-page__title"><?php the_archive_title(); ?></h1>
		</header>

		<?php if ( have_posts() ) : ?>
			<div class="gv-blog__grid">
				<?php
				while ( have_posts() ) :
					the_post();
					gallegovela_render_post_card( get_post() );
				endwhile;
				?>
			</div>

			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'No se ha encontrado contenido.', 'gallegovela-theme' ); ?></p>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>
