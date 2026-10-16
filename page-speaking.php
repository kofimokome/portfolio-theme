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

$talks = array(
	array(
		'event'   => 'WordCamp Johannesburg',
		'loc'     => 'South Africa',
		'date'    => 'October 2026',
		'topic'   => 'Backend engineering, AI integration, and scalable WordPress products.',
	),
	array(
		'event'   => 'WordCamp Nairobi',
		'loc'     => 'Kenya',
		'date'    => 'November 2024',
		'topic'   => 'How AI is transforming WordPress development and responsible adoption of AI-assisted tools.',
	),
	array(
		'event'   => 'WordCamp Jinja',
		'loc'     => 'Uganda',
		'date'    => 'September 2024',
		'topic'   => 'Open-source contributions and community building for African developers.',
	),
	array(
		'event'   => 'Buea WordPress Meetup',
		'loc'     => 'Buea, Cameroon',
		'date'    => 'Ongoing since June 2023',
		'topic'   => 'Regular talks and workshops on WordPress, web development, and digital skills.',
	),
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
				<?php foreach ( $talks as $talk ) : ?>
					<article class="km-talk-card km-reveal">
						<div class="km-talk-card__media">
							<img src="<?php echo esc_url( KOFIMOKOME_URI . '/assets/img/placeholder.svg' ); ?>" alt="<?php echo esc_attr( $talk['event'] ); ?> photo placeholder">
						</div>
						<div class="km-talk-card__body">
							<h2 class="km-talk-card__title"><?php echo esc_html( $talk['event'] ); ?></h2>
							<div class="km-talk-card__meta"><?php echo esc_html( $talk['loc'] ); ?> · <?php echo esc_html( $talk['date'] ); ?></div>
							<p class="km-talk-card__desc"><?php echo esc_html( $talk['topic'] ); ?></p>
						</div>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
