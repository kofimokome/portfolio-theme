<?php
/**
 * Speaking page template.
 *
 * @package KofiMokome
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$talks_query = new WP_Query(
	array(
		'post_type'      => 'speaking',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'DESC',
	)
);
?>

<main class="km-content km-page">
	<section class="km-page-hero km-page-hero--split km-reveal">
		<div class="km-page-hero__inner">
			<div class="km-page-hero__grid">
				<div class="km-page-hero__content">
					<span class="km-page-hero__eyebrow">Speaking</span>
					<h1 class="km-page-hero__title">Sharing knowledge across <em>Africa</em>.</h1>
					<p class="km-page-hero__intro">
						I enjoy sharing knowledge at WordCamps, meetups, and community events. From backend engineering to AI adoption, my talks focus on practical lessons builders can use right away.
					</p>

					<div class="km-page-hero__stats">
						<div class="km-stat">
							<div class="km-stat__value">4</div>
							<div class="km-stat__label">Countries</div>
						</div>
						<div class="km-stat">
							<div class="km-stat__value">3</div>
							<div class="km-stat__label">WordCamps</div>
						</div>
						<div class="km-stat">
							<div class="km-stat__value">20+</div>
							<div class="km-stat__label">Meetups</div>
						</div>
					</div>
				</div>
				<div class="km-page-hero__media">
					<img src="<?php echo esc_url( KOFIMOKOME_URI . '/assets/img/speaking/wordcamp-jinja-1.jpg' ); ?>" alt="Kofi Mokome speaking at WordCamp Jinja 2024">
				</div>
			</div>
		</div>
	</section>

	<section class="km-page-section">
		<div class="km-container">
			<div class="km-page-grid">
				<?php
				if ( $talks_query->have_posts() ) :
					while ( $talks_query->have_posts() ) :
						$talks_query->the_post();
						$location = kofimokome_get_speaking_location();
						$date     = kofimokome_get_speaking_date();
						?>
						<article class="km-talk-card km-reveal">
							<div class="km-talk-card__media">
								<img src="<?php echo esc_url( KOFIMOKOME_URI . '/assets/img/placeholder.svg' ); ?>" alt="<?php the_title_attribute(); ?> photo placeholder">
							</div>
							<div class="km-talk-card__body">
								<h2 class="km-talk-card__title"><?php the_title(); ?></h2>
								<div class="km-talk-card__meta"><?php echo esc_html( $location ); ?> · <?php echo esc_html( $date ); ?></div>
								<p class="km-talk-card__desc"><?php echo esc_html( wp_trim_words( get_the_content(), 40 ) ); ?></p>
							</div>
						</article>
					<?php endwhile; ?>
				<?php else : ?>
					<p><?php esc_html_e( 'No talks yet.', 'kofimokome' ); ?></p>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
