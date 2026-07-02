<?php
/**
 * Template base para todas las páginas estáticas.
 *
 * No añade contenedor ni título propios: el contenido de cada página
 * (introducido en el editor de WordPress) es responsable de su propio
 * layout y estructura de secciones.
 *
 * Para páginas estándar (política de privacidad, aviso legal…) basta con
 * envolver el contenido en un bloque HTML con clase .gv-page-content.
 */

get_header();
?>

<main id="primary" class="gv-page">
	<?php
	while ( have_posts() ) :
		the_post();
		the_content();
	endwhile;
	?>
</main>

<?php get_footer(); ?>
