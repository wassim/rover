<?php
/**
 * The template for displaying all single posts
 *
 * @package Rover
 */

get_header(); ?>

	<div id="primary" class="content">
		<main id="main" class="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation( array(
				'prev_text' => __('<span class="meta-nav">&larr;</span> Prev Post', 'rover'),
				'next_text' => __('Next Post <span class="meta-nav">&rarr;</span>', 'rover'),
			) );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
