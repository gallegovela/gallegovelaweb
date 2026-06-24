<?php get_header(); ?>

<?php
while ( have_posts() ) :
	the_post();
	$gv_id       = get_the_ID();
	$gv_cliente  = gallegovela_get_proyecto_cliente( $gv_id );
	$gv_fecha    = gallegovela_get_proyecto_fecha( $gv_id );
	$gv_url      = gallegovela_get_proyecto_url( $gv_id );
	$gv_galeria  = gallegovela_get_proyecto_galeria( $gv_id );
	?>
	<main id="primary" class="gv-project-single">
		<div class="gv-container">
			<header class="gv-project-single__header">
				<h1 class="gv-project-single__title"><?php the_title(); ?></h1>
				<div class="gv-project-single__tags">
					<?php echo gallegovela_tecnologia_badges( $gv_id ); ?>
				</div>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="gv-project-single__media">
					<?php the_post_thumbnail( 'large', array( 'loading' => 'lazy' ) ); ?>
				</div>
			<?php endif; ?>

			<div class="gv-project-single__body">
				<div class="gv-project-single__content">
					<?php the_content(); ?>
				</div>

				<aside class="gv-project-single__meta">
					<?php if ( $gv_cliente ) : ?>
						<p><strong><?php esc_html_e( 'Cliente', 'gallegovela-theme' ); ?>:</strong> <?php echo esc_html( $gv_cliente ); ?></p>
					<?php endif; ?>
					<?php if ( $gv_fecha ) : ?>
						<p><strong><?php esc_html_e( 'Fecha', 'gallegovela-theme' ); ?>:</strong> <?php echo esc_html( $gv_fecha ); ?></p>
					<?php endif; ?>
					<?php if ( $gv_url ) : ?>
						<p><a class="gv-button gv-button--secondary" href="<?php echo esc_url( $gv_url ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Ver proyecto', 'gallegovela-theme' ); ?></a></p>
					<?php endif; ?>
				</aside>
			</div>

			<?php if ( ! empty( $gv_galeria ) ) : ?>
				<div class="gv-project-single__gallery">
					<?php foreach ( $gv_galeria as $gv_attachment_id ) : ?>
						<?php echo wp_get_attachment_image( $gv_attachment_id, 'large', false, array( 'loading' => 'lazy' ) ); ?>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</main>
	<?php
endwhile;
?>

<?php get_footer(); ?>
