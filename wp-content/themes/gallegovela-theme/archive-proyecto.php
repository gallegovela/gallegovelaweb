<?php
/**
 * /proyectos — archivo del CPT 'proyecto' (has_archive), no una Página de WordPress.
 */

get_header();

$gv_batch = 9;

$gv_query = new WP_Query( array(
	'post_type'      => 'proyecto',
	'post_status'    => 'publish',
	'posts_per_page' => $gv_batch,
	'offset'         => 0,
	'orderby'        => array( 'menu_order' => 'ASC', 'date' => 'DESC' ),
) );

$gv_total  = $gv_query->found_posts;
$gv_loaded = min( $gv_batch, $gv_total );

get_template_part( 'template-parts/hero-interno', null, array(
	'eyebrow' => __( '/ Proyectos', 'gallegovela-theme' ),
	'title'   => __( 'Algunas de los trabajos que he realizado o en los que he colaborado', 'gallegovela-theme' ),
	'image'   => GALLEGOVELA_THEME_URI . '/assets/images/hero-proyectos.png',
) );
?>

<main id="primary" class="gv-projects-catalog">
	<div class="gv-container">
		<?php if ( $gv_total > 0 ) : ?>
			<div class="gv-projects-catalog__grid" id="gv-projects-grid">
				<?php
				foreach ( $gv_query->posts as $gv_proyecto ) {
					gallegovela_render_project_card( $gv_proyecto );
				}
				?>
			</div>

			<p class="gv-catalog__status" id="gv-projects-status" data-loaded="<?php echo esc_attr( $gv_loaded ); ?>" data-total="<?php echo esc_attr( $gv_total ); ?>">
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
		<?php else : ?>
			<p class="gv-projects__empty"><?php esc_html_e( 'Todavía no hay proyectos publicados.', 'gallegovela-theme' ); ?></p>
		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>
