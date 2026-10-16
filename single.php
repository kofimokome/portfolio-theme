<?php
/**
 * Single post template for Kofi Mokome child theme.
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
	while ( have_posts() ) :
		the_post();
		?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<h1 class="entry-title" style="font-size:2.4rem; margin-bottom:0.5rem;"><?php the_title(); ?></h1>
				<div class="entry-meta" style="color:var(--km-text-muted); font-size:0.9rem; margin-bottom:1.5rem;">
					<?php echo esc_html( get_the_date() ); ?> · <?php the_author(); ?>
				</div>
			</header>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; ?>
</div>

<?php
get_footer();
