<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Rover
 */

get_header(); ?>

	<div id="primary" class="content">
		<main id="main" class="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'rover' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p class="alert alert-warning"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'rover' ); ?></p>

					<?php
						get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
