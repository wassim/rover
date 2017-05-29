<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package rover
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-thumbnail">
		<?php
		if ( is_single() ) :
			the_post_thumbnail();
		else: ?>
			<a href="<?php echo esc_url( get_permalink() ) ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		<?php
		endif; ?>
	</div><!-- .entry-thumbnail -->
	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php rover_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif;

		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'rover' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rover' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php
	if ( is_single() ) : ?>
	<footer class="entry-footer">
		<?php rover_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	<?php
	endif; ?>
</article><!-- #post-## -->
