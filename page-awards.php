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

$awards = array(
	array(
		'title' => 'Yoast Diversity Fund',
		'year'  => '2026',
		'desc'  => 'Recognized for contributions to diversity and inclusion within the WordPress and wider open-source community.',
		'icon'  => 'fa-award',
	),
	array(
		'title' => 'Yoast Care Fund',
		'year'  => '2025',
		'desc'  => 'Honoured for care work and community support in the WordPress ecosystem.',
		'icon'  => 'fa-heart',
	),
	array(
		'title' => 'Yoast Diversity Fund',
		'year'  => '2024',
		'desc'  => 'First Diversity Fund recognition for efforts in making the WordPress community more inclusive.',
		'icon'  => 'fa-award',
	),
);
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
					<div class="km-stat__value">3</div>
					<div class="km-stat__label">Yoast recognitions</div>
				</div>
				<div class="km-stat">
					<div class="km-stat__value">2</div>
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
				<?php foreach ( $awards as $award ) : ?>
					<article class="km-award-card km-reveal">
						<div class="km-award-card__icon">
							<i class="fas <?php echo esc_attr( $award['icon'] ); ?>"></i>
						</div>
						<h2 class="km-award-card__title"><?php echo esc_html( $award['title'] ); ?></h2>
						<div class="km-award-card__year"><?php echo esc_html( $award['year'] ); ?></div>
						<p class="km-award-card__desc"><?php echo esc_html( $award['desc'] ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
