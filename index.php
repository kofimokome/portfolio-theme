<?php
/**
 * Default index template for Kofi Mokome child theme.
 *
 * @package KofiMokome
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<div class="km-content km-container km-reveal">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h2 class="entry-title" style="font-size:1.6rem; margin-bottom:0.5rem;">
						<a href="<?php the_permalink(); ?>" style="color:var(--km-text);"><?php the_title(); ?></a>
					</h2>
					<div class="entry-meta" style="color:var(--km-text-muted); font-size:0.85rem; margin-bottom:1rem;">
						<?php echo esc_html( get_the_date() ); ?>
					</div>
				</header>
				<div class="entry-content">
					<?php the_excerpt(); ?>
				</div>
			</article>
		<?php endwhile; ?>

		<div class="km-pagination" style="margin-top:2rem;">
			<?php
			the_posts_pagination(
				array(
					'mid_size'  => 2,
					'prev_text' => __( 'Previous', 'kofimokome' ),
					'next_text' => __( 'Next', 'kofimokome' ),
				)
			);
			?>
		</div>

	<?php else : ?>
		<p><?php esc_html_e( 'No posts found.', 'kofimokome' ); ?></p>
	<?php endif; ?>
</div>

<?php
get_footer();
