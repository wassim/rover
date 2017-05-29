<?php
/**
 * Custom template tags for this theme
 *
 * @package Rover
 */

if ( ! function_exists( 'rover_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time in a human readable format.
 */
function rover_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s %3$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( human_time_diff( get_the_time('U'), current_time('timestamp') ) ),
		esc_html__( 'ago', 'rover' )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'rover' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span>';

}
endif;

if ( ! function_exists( 'rover_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function rover_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'rover' ) );
		if ( $categories_list && rover_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Filed under %1$s', 'rover' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '#', esc_html__( ' #', 'rover' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'rover' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'rover' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'rover' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">* ',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function rover_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'rover_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'rover_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so rover_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so rover_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in rover_categorized_blog.
 */
function rover_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'rover_categories' );
}
add_action( 'edit_category', 'rover_category_transient_flusher' );
add_action( 'save_post',     'rover_category_transient_flusher' );
