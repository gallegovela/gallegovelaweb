<?php get_header(); ?>

<main id="primary" class="gv-page">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
		<article <?php post_class( 'gv-page__article' ); ?>>
			<header class="gv-page__header">
				<h1 class="gv-page__title"><?php the_title(); ?></h1>
			</header>

			<div class="gv-page__content">
				<?php the_content(); ?>
			</div>
		</article>
		<?php
	endwhile;
	?>
</main>

<?php get_footer(); ?>
