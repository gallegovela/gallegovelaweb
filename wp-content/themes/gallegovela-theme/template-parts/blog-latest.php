<?php
/**
 * Últimas 3 entradas del blog estándar de WordPress.
 * La tarjeta (gallegovela_render_blog_card) vive en el plugin
 * gallegovela-projects, con el mismo diseño que Proyectos destacados.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gv_blog_query = new WP_Query( array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 3,
) );

$gv_render_blog_card = function_exists( 'gallegovela_render_blog_card' )
	? 'gallegovela_render_blog_card'
	: 'gallegovela_render_post_card';
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
					call_user_func( $gv_render_blog_card, get_post() );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		<?php else : ?>
			<p class="gv-blog__empty"><?php esc_html_e( 'Próximamente.', 'gallegovela-theme' ); ?></p>
		<?php endif; ?>
	</div>
</section>
