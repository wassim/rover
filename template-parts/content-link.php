<?php
/**
 * Template part for displaying link posts
 *
 * @package Rover
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php
		the_content(); ?>
	</div><!-- .entry-content -->
	<?php
	if ( is_single() ) : ?>
	<footer class="entry-footer">
		<?php rover_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<?php
	endif; ?>
</article><!-- #post-## -->
