<?php
/**
 * Últimas 4 entradas del blog estándar de WordPress.
 * Lógica de post aquí (no en el plugin, que es para proyectos).
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gv_blog_query = new WP_Query( array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 4,
) );
?>
<section id="ultimas-entradas" class="gv-blog">
	<div class="gv-container">
		<div class="gv-section-header">
			<div class="gv-section-header__left">
				<h3 class="home-section-overtitle"><?php esc_html_e( 'Blog', 'gallegovela-theme' ); ?></h3>
				<h2 class="home-section-title"><?php esc_html_e( 'Últimos posts', 'gallegovela-theme' ); ?></h2>
			</div>
			<div class="gv-section-header__right">
				<a class="gv-section-header__link" href="<?php echo esc_url( home_url( '/blog' ) ); ?>"><?php esc_html_e( 'Ver Todos', 'gallegovela-theme' ); ?></a>
			</div>
		</div>

		<?php if ( $gv_blog_query->have_posts() ) : ?>
			<div class="gv-blog__grid">
				<?php
				while ( $gv_blog_query->have_posts() ) :
					$gv_blog_query->the_post();
					gallegovela_render_post_card( get_post() );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		<?php else : ?>
			<p class="gv-blog__empty"><?php esc_html_e( 'Próximamente.', 'gallegovela-theme' ); ?></p>
		<?php endif; ?>
	</div>
</section>
