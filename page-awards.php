<?php
/**
 * Awards page template.
 *
 * @package KofiMokome
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$awards_query = new WP_Query(
	array(
		'post_type'      => 'award',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'DESC',
	)
);

$award_count = wp_count_posts( 'award' )->publish;
?>

<main class="km-content km-page">
	<section class="km-page-hero km-reveal">
		<div class="km-page-hero__inner">
			<span class="km-page-hero__eyebrow">Recognition</span>
			<h1 class="km-page-hero__title">Honoured for community, diversity & <em>inclusion</em>.</h1>
			<p class="km-page-hero__intro">
				Grateful for the recognition from Yoast for community, diversity, and inclusion work in the WordPress ecosystem.
			</p>

			<div class="km-page-hero__stats">
				<div class="km-stat">
					<div class="km-stat__value"><?php echo esc_html( $award_count ); ?></div>
					<div class="km-stat__label">Yoast recognitions</div>
				</div>
				<div class="km-stat">
					<div class="km-stat__value"><?php echo esc_html( $awards_query->found_posts - 1 ); ?></div>
					<div class="km-stat__label">Diversity Fund awards</div>
				</div>
				<div class="km-stat">
					<div class="km-stat__value">1</div>
					<div class="km-stat__label">Care Fund award</div>
				</div>
			</div>
		</div>
	</section>

	<section class="km-page-section">
		<div class="km-container">
			<div class="km-page-grid">
				<?php
				if ( $awards_query->have_posts() ) :
					while ( $awards_query->have_posts() ) :
						$awards_query->the_post();
						$year = kofimokome_get_award_year();
						$icon = kofimokome_get_award_icon();
						?>
						<article class="km-award-card km-reveal">
							<div class="km-award-card__icon">
								<i class="fas <?php echo esc_attr( $icon ); ?>"></i>
							</div>
							<h2 class="km-award-card__title"><?php the_title(); ?></h2>
							<div class="km-award-card__year"><?php echo esc_html( $year ); ?></div>
							<p class="km-award-card__desc"><?php echo esc_html( wp_trim_words( get_the_content(), 40 ) ); ?></p>
						</article>
					<?php endwhile; ?>
				<?php else : ?>
					<p><?php esc_html_e( 'No awards yet.', 'kofimokome' ); ?></p>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
