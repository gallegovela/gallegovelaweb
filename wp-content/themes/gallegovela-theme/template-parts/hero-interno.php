<?php
/**
 * Hero interno: cabecera reutilizable para páginas interiores
 * (Proyectos, Blog...). Dos columnas — texto a la izquierda,
 * imagen decorativa a la derecha.
 *
 * $args:
 * - eyebrow     string  Texto del sobretítulo (incluye la "/" si aplica).
 * - title       string  Título (h1). Permite HTML (wp_kses_post) para
 *                       resaltar parte del texto con <span class="gv-text-accent">.
 * - description string  Texto opcional bajo el título.
 * - buttons     array   Opcional. Cada item: ['label'=>, 'href'=>, 'type'=>'primary'|'secondary'].
 * - image       string  URL de la imagen decorativa de la columna derecha.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$gv_eyebrow     = isset( $args['eyebrow'] ) ? $args['eyebrow'] : '';
$gv_title       = isset( $args['title'] ) ? $args['title'] : '';
$gv_description = isset( $args['description'] ) ? $args['description'] : '';
$gv_buttons     = isset( $args['buttons'] ) ? (array) $args['buttons'] : array();
$gv_image       = isset( $args['image'] ) ? $args['image'] : '';
?>
<section class="gv-page-hero">
	<div class="gv-container gv-page-hero__inner">
		<div class="gv-page-hero__content">
			<?php if ( $gv_eyebrow ) : ?>
				<p class="gv-section-eyebrow"><?php echo esc_html( $gv_eyebrow ); ?></p>
			<?php endif; ?>

			<?php if ( $gv_title ) : ?>
				<h1 class="gv-page-hero__title"><?php echo wp_kses_post( $gv_title ); ?></h1>
			<?php endif; ?>

			<?php if ( $gv_description ) : ?>
				<p class="gv-page-hero__desc"><?php echo esc_html( $gv_description ); ?></p>
			<?php endif; ?>

			<?php if ( ! empty( $gv_buttons ) ) : ?>
				<div class="gv-page-hero__actions">
					<?php foreach ( $gv_buttons as $gv_button ) :
						$gv_type = ( isset( $gv_button['type'] ) && 'secondary' === $gv_button['type'] )
							? 'gv-button--secondary'
							: 'gv-button--primary';
						?>
						<a class="gv-button <?php echo esc_attr( $gv_type ); ?>" href="<?php echo esc_url( $gv_button['href'] ); ?>">
							<?php echo esc_html( $gv_button['label'] ); ?>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>

		<?php if ( $gv_image ) : ?>
			<div class="gv-page-hero__visual" aria-hidden="true">
				<img src="<?php echo esc_url( $gv_image ); ?>" alt="" loading="eager">
			</div>
		<?php endif; ?>
	</div>
</section>
