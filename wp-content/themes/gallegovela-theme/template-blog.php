<?php
/**
 * /blog — plantilla del tema enrutada por rewrite rule (inc/setup.php),
 * no una Página de WordPress.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$gv_batch = 5;

$gv_query = new WP_Query( array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => $gv_batch,
	'offset'         => 0,
	'orderby'        => 'date',
	'order'          => 'DESC',
) );

$gv_total  = $gv_query->found_posts;
$gv_loaded = min( $gv_batch, $gv_total );

$gv_categories = get_terms( array( 'taxonomy' => 'category', 'hide_empty' => true ) );
$gv_tags       = get_terms( array( 'taxonomy' => 'post_tag', 'hide_empty' => true ) );

$gv_render_blog_card = function_exists( 'gallegovela_render_blog_card' )
	? 'gallegovela_render_blog_card'
	: 'gallegovela_render_post_card';

get_template_part( 'template-parts/hero-interno', null, array(
	'eyebrow' => __( '/ Blog', 'gallegovela-theme' ),
	'title'   => __( 'Artículos relacionados con mi experiencia profesional', 'gallegovela-theme' ),
	'image'   => GALLEGOVELA_THEME_URI . '/assets/images/hero-blog.png',
) );
?>

<main id="primary" class="gv-blog-page">
	<div class="gv-container">
		<div class="gv-blog-layout">
			<div class="gv-blog-layout__main">
				<?php if ( $gv_total > 0 ) : ?>
					<div class="gv-blog-catalog__list" id="gv-posts-grid">
						<?php
						foreach ( $gv_query->posts as $gv_post ) {
							call_user_func( $gv_render_blog_card, $gv_post );
						}
						?>
					</div>
				<?php else : ?>
					<p class="gv-blog__empty" id="gv-posts-empty"><?php esc_html_e( 'No se ha encontrado contenido.', 'gallegovela-theme' ); ?></p>
				<?php endif; ?>

				<p class="gv-catalog__status" id="gv-posts-status" data-loaded="<?php echo esc_attr( $gv_loaded ); ?>" data-total="<?php echo esc_attr( $gv_total ); ?>">
					<span class="gv-catalog__count">
						<?php
						printf(
							/* translators: 1: loaded count, 2: total count */
							esc_html__( '%1$d / %2$d', 'gallegovela-theme' ),
							(int) $gv_loaded,
							(int) $gv_total
						);
						?>
					</span>
					<?php if ( $gv_loaded < $gv_total ) : ?>
						<span class="gv-catalog__more"><?php esc_html_e( 'Scroll para mostrar más', 'gallegovela-theme' ); ?></span>
					<?php endif; ?>
				</p>
			</div>

			<aside class="gv-blog-layout__sidebar" id="gv-blog-sidebar">
				<form class="gv-blog-search" id="gv-blog-search-form" role="search">
					<label class="screen-reader-text" for="gv-blog-search-input"><?php esc_html_e( 'Buscar en el blog', 'gallegovela-theme' ); ?></label>
					<input type="search" id="gv-blog-search-input" class="gv-blog-search__input" placeholder="<?php esc_attr_e( 'Buscar…', 'gallegovela-theme' ); ?>">
					<button type="submit" class="gv-blog-search__button" aria-label="<?php esc_attr_e( 'Buscar', 'gallegovela-theme' ); ?>">
						<?php esc_html_e( 'Buscar', 'gallegovela-theme' ); ?>
					</button>
				</form>

				<?php if ( ! empty( $gv_categories ) && ! is_wp_error( $gv_categories ) ) : ?>
					<div class="gv-blog-filter-group">
						<h3 class="gv-blog-filter-group__title"><?php esc_html_e( 'Categorías', 'gallegovela-theme' ); ?></h3>
						<div class="gv-blog-filter" id="gv-blog-filter-categories" data-filter-type="categories">
							<?php foreach ( $gv_categories as $gv_term ) : ?>
								<button type="button" class="gv-badge gv-blog-filter__item" data-term-id="<?php echo esc_attr( $gv_term->term_id ); ?>"><?php echo esc_html( $gv_term->name ); ?></button>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $gv_tags ) && ! is_wp_error( $gv_tags ) ) : ?>
					<div class="gv-blog-filter-group">
						<h3 class="gv-blog-filter-group__title"><?php esc_html_e( 'Etiquetas', 'gallegovela-theme' ); ?></h3>
						<div class="gv-blog-filter" id="gv-blog-filter-tags" data-filter-type="tags">
							<?php foreach ( $gv_tags as $gv_term ) : ?>
								<button type="button" class="gv-badge gv-blog-filter__item" data-term-id="<?php echo esc_attr( $gv_term->term_id ); ?>"><?php echo esc_html( $gv_term->name ); ?></button>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
			</aside>
		</div>
	</div>
</main>

<?php get_footer(); ?>
