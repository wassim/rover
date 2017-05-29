<?php
/**
 * Rover functions and definitions
 *
 * @package Rover
 */

if ( ! function_exists( 'rover_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function rover_setup() {

	// Make Rover available for translation.
	load_theme_textdomain( 'rover', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Add support for title tag.
	add_theme_support( 'title-tag' );

	// Add support for post formats.
	add_theme_support( 'post-formats', array( 'image', 'link', 'quote', 'video' ) );

	// Add support for thumbnails.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 980, 600, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary_navigation' => esc_html__( 'Primary Navigation', 'rover' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'rover_custom_background_args', array(
		'default-color' => 'f0f0f0',
		'default-image' => '',
	) ) );

	// Use a custom editor stylesheet.
	add_editor_style( 'css/editor-style.css' );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'rover_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rover_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rover_content_width', 980 );
}
add_action( 'after_setup_theme', 'rover_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function rover_scripts() {
	wp_enqueue_style( 'rover-style', get_stylesheet_uri() );

	wp_enqueue_script( 'rover-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'rover-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rover_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
