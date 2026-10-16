<?php
/**
 * The footer for the Kofi Mokome child theme.
 *
 * @package KofiMokome
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</main><!-- #km-main -->

<footer class="km-footer">
	<div class="km-container">
		<p>
			&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?>
			<?php echo esc_html( get_bloginfo( 'name' ) ); ?>.
			<?php echo wp_kses_post( get_theme_mod( 'kofimokome_footer_text', esc_html__( 'Built with WordPress, Hello Elementor & a custom child theme.', 'kofimokome' ) ) ); ?>
		</p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
