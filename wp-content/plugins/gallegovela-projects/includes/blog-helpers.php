<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Devuelve $limit entradas de blog, más recientes primero.
 */
function gallegovela_get_latest_posts( $limit = 3 ) {
	$query = new WP_Query( array(
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => $limit,
		'orderby'        => 'date',
		'order'          => 'DESC',
	) );

	return $query->posts;
}

/**
 * Tarjeta de entrada de blog. Mismo orden visual que las tarjetas de
 * proyectos destacados: imagen, etiquetas, título, extracto
 * (`.gv-card`, ver assets/css/components/cards.css del theme, que
 * comparte reglas entre `.gv-project-card__*` y `.gv-post-card__*`).
 */
function gallegovela_render_blog_card( $post ) {
	if ( ! $post ) {
		return;
	}

	$tags = get_the_tags( $post );
	?>
	<article class="gv-card gv-post-card">
		<a class="gv-post-card__link" href="<?php echo esc_url( get_permalink( $post ) ); ?>">
			<?php if ( has_post_thumbnail( $post ) ) : ?>
				<div class="gv-post-card__media">
					<?php echo get_the_post_thumbnail( $post, 'gallegovela-card', array( 'loading' => 'lazy' ) ); ?>
				</div>
			<?php endif; ?>
			<?php if ( ! empty( $tags ) ) : ?>
				<div class="gv-post-card__tags">
					<?php foreach ( $tags as $tag ) : ?>
						<span class="gv-badge"><?php echo esc_html( $tag->name ); ?></span>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<?php if ( function_exists( 'gallegovela_format_date_es' ) ) : ?>
				<time class="gv-post-card__date" datetime="<?php echo esc_attr( get_the_date( 'c', $post ) ); ?>">
					<?php echo esc_html( gallegovela_format_date_es( $post ) ); ?>
				</time>
			<?php endif; ?>
			<h3 class="gv-post-card__title"><?php echo esc_html( get_the_title( $post ) ); ?></h3>
			<p class="gv-post-card__excerpt"><?php echo esc_html( get_the_excerpt( $post ) ); ?></p>
		</a>
	</article>
	<?php
}
