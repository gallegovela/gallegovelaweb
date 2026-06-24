<?php get_header(); ?>

<?php
while ( have_posts() ) :
	the_post();
	?>
	<main id="primary" class="gv-post-single">
		<div class="gv-container">
			<article <?php post_class(); ?>>
				<header class="gv-post-single__header">
					<h1 class="gv-post-single__title"><?php the_title(); ?></h1>
					<time class="gv-post-single__date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
						<?php echo esc_html( get_the_date() ); ?>
					</time>
				</header>

				<?php if ( has_post_thumbnail() ) : ?>
					<div class="gv-post-single__media">
						<?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?>
					</div>
				<?php endif; ?>

				<div class="gv-post-single__content">
					<?php the_content(); ?>
				</div>
			</article>
		</div>
	</main>
	<?php
endwhile;
?>

<?php get_footer(); ?>
