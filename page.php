<?php
/**
 * Default page template for Kofi Mokome child theme.
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
			<?php if ( ! is_front_page() ) : ?>
				<header class="entry-header">
					<h1 class="entry-title" style="font-size:2.4rem; margin-bottom:1rem;"><?php the_title(); ?></h1>
				</header>
			<?php endif; ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; ?>
</div>

<?php
get_footer();
