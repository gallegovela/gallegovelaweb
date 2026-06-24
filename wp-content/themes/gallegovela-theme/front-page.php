<?php get_header(); ?>

<main id="primary" class="gv-home">
	<?php
	get_template_part( 'template-parts/hero' );
	get_template_part( 'template-parts/about-mosaic' );
	get_template_part( 'template-parts/stack-timeline' );
	get_template_part( 'template-parts/projects-featured' );
	get_template_part( 'template-parts/blog-latest' );
	?>
</main>

<?php get_footer(); ?>
