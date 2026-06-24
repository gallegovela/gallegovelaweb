<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gv_post = isset( $args['post'] ) ? $args['post'] : get_post();

if ( ! $gv_post ) {
	return;
}

$gv_categories = get_the_category( $gv_post );
$gv_category   = ! empty( $gv_categories ) ? $gv_categories[0] : null;
?>
<article class="gv-card gv-post-card">
	<a class="gv-post-card__link" href="<?php echo esc_url( get_permalink( $gv_post ) ); ?>">
		<?php if ( has_post_thumbnail( $gv_post ) ) : ?>
			<div class="gv-post-card__media">
				<?php echo get_the_post_thumbnail( $gv_post, 'gallegovela-card', array( 'loading' => 'lazy' ) ); ?>
			</div>
		<?php endif; ?>
		<?php if ( $gv_category ) : ?>
			<span class="gv-badge gv-post-card__category"><?php echo esc_html( $gv_category->name ); ?></span>
		<?php endif; ?>
		<time class="gv-post-card__date" datetime="<?php echo esc_attr( get_the_date( 'c', $gv_post ) ); ?>">
			<?php echo esc_html( get_the_date( '', $gv_post ) ); ?>
		</time>
		<h3 class="gv-post-card__title"><?php echo esc_html( get_the_title( $gv_post ) ); ?></h3>
		<p class="gv-post-card__excerpt"><?php echo esc_html( get_the_excerpt( $gv_post ) ); ?></p>
	</a>
</article>
