<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<main id="primary" class="gv-page gv-page--legal">
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="gv-page-legal__header">
		<h2 class="gv-page-legal__title"><?php the_title(); ?></h2>
	</div>
	<?php if ( get_the_content() ) : ?>
	<div class="gv-container gv-page-legal__content">
		<?php the_content(); ?>
	</div>
	<?php endif; ?>
	<?php endwhile; ?>
</main>
