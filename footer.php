<?php
/**
 * The template for displaying the footer
 *
 * @package Rover
 */
?>

	</div><!-- .wrap -->

	<footer id="colophon" class="content-info">
		<div class="container">
			<p class="credit">
				<?php esc_html_e( 'Proudly powered by ', 'rover' ); ?><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'rover' ) ); ?>" title="<?php esc_html_e( 'WordPress', 'rover' ); ?>"><?php esc_html_e( 'WordPress', 'rover' ); ?></a>.
				<?php esc_html_e( 'Theme: ', 'rover' ); ?><a href="<?php echo esc_url( __( 'https://wassim.is/rover/', 'rover' ) ); ?>" title="<?php esc_html_e( 'Rover', 'rover' ); ?>"><?php esc_html_e( 'Rover', 'rover' ); ?></a> <?php esc_html_e( 'by', 'rover' ); ?>
				<a href="<?php echo esc_url( __( 'https://wassim.is/', 'rover' ) ); ?>" title="<?php esc_html_e( 'Wassim', 'rover' ); ?>"><?php esc_html_e( 'Wassim', 'rover' ); ?></a>
			</p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
