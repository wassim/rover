<?php
/**
 * Template part for displaying quote posts
 *
 * @package Rover
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( is_single() ) : ?>
	<div class="entry-content">
		<?php
		the_content(); ?>
	</div><!-- .entry-content -->
	<?php
	else : ?>
	<a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark">
		<div class="entry-content">
			<?php
			the_content(); ?>
		</div><!-- .entry-content -->
	</a>
	<?php
	endif;

	if ( is_single() ) : ?>
	<footer class="entry-footer">
		<?php rover_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<?php
	endif; ?>
</article><!-- #post-## -->
