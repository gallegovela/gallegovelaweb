<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gv_proyecto = isset( $args['proyecto'] ) ? $args['proyecto'] : get_post();

if ( ! $gv_proyecto ) {
	return;
}

$gv_id = $gv_proyecto->ID;
?>
<article class="gv-card gv-project-card">
	<a class="gv-project-card__link" href="<?php echo esc_url( get_permalink( $gv_proyecto ) ); ?>">
		<?php if ( has_post_thumbnail( $gv_proyecto ) ) : ?>
			<div class="gv-project-card__media">
				<?php echo get_the_post_thumbnail( $gv_proyecto, 'gallegovela-card', array( 'loading' => 'lazy' ) ); ?>
			</div>
		<?php endif; ?>
		<h3 class="gv-project-card__title"><?php echo esc_html( get_the_title( $gv_proyecto ) ); ?></h3>
		<p class="gv-project-card__excerpt"><?php echo esc_html( get_the_excerpt( $gv_proyecto ) ); ?></p>
	</a>
	<div class="gv-project-card__tags">
		<?php echo gallegovela_tecnologia_badges( $gv_id ); ?>
	</div>
</article>
