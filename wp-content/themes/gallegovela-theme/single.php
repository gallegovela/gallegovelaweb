<?php get_header(); ?>

<?php
while ( have_posts() ) :
	the_post();
	$gv_categories = get_the_category();
	$gv_eyebrow    = ! empty( $gv_categories ) ? $gv_categories[0]->name : '';
	$gv_tags       = get_the_tags();
	?>
	<main id="primary" class="gv-post-single">
		<div class="gv-container">
			<article <?php post_class(); ?>>
				<header class="gv-post-single__header">
					<?php if ( $gv_eyebrow ) : ?>
						<p class="gv-section-eyebrow"><?php echo esc_html( $gv_eyebrow ); ?></p>
					<?php endif; ?>
					<h1 class="gv-post-single__title"><?php the_title(); ?></h1>
					<time class="gv-post-single__date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
						<?php echo esc_html( gallegovela_format_date_es( get_post() ) ); ?>
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

				<?php if ( ! empty( $gv_tags ) ) : ?>
					<footer class="gv-post-single__tags">
						<?php foreach ( $gv_tags as $gv_tag ) : ?>
							<span class="gv-badge"><?php echo esc_html( $gv_tag->name ); ?></span>
						<?php endforeach; ?>
					</footer>
				<?php endif; ?>
			</article>
		</div>
	</main>
	<?php
endwhile;
?>

<?php get_footer(); ?>
