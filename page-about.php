<?php
/**
 * About page template.
 *
 * @package KofiMokome
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main class="km-content km-page">
	<section class="km-page-hero km-reveal">
		<div class="km-page-hero__inner">
			<span class="km-page-hero__eyebrow">About me</span>
			<h1 class="km-page-hero__title">Engineering backends, integrating <em>AI</em>, and empowering communities.</h1>
			<p class="km-page-hero__intro">
				Cameroonian software engineer with a Master's in Computer Engineering. I ship production APIs, WordPress products, AI-powered features, and open-source tools while teaching and mentoring the next generation of developers.
			</p>

			<div class="km-page-hero__stats">
				<div class="km-stat">
					<div class="km-stat__value">5+</div>
					<div class="km-stat__label">Years building</div>
				</div>
				<div class="km-stat">
					<div class="km-stat__value">4</div>
					<div class="km-stat__label">Countries spoken</div>
				</div>
				<div class="km-stat">
					<div class="km-stat__value">10+</div>
					<div class="km-stat__label">Open-source tools</div>
				</div>
				<div class="km-stat">
					<div class="km-stat__value"><em>AI</em></div>
					<div class="km-stat__label">First love</div>
				</div>
			</div>
		</div>
	</section>

	<section class="km-page-section">
		<div class="km-container">
			<div class="km-page-grid" style="align-items: center; gap: 3rem;">
				<div class="km-reveal">
					<div class="km-photo-placeholder" style="min-height: 420px; border-radius: var(--km-radius-lg);">
						<img src="<?php echo esc_url( KOFIMOKOME_URI . '/assets/img/placeholder.svg' ); ?>" alt="Kofi Mokome photo placeholder" style="border-radius: var(--km-radius-lg);">
					</div>
				</div>
				<div class="km-reveal">
					<span class="km-section__eyebrow">The story so far</span>
					<h2 class="km-page-section__title">From student projects to production systems.</h2>
					<p>
						I am a Cameroonian software engineer with a Master's in Computer Engineering and a passion for building reliable, scalable systems. Over the years I have shipped production APIs, custom WordPress products, AI-powered features, and open-source tools while teaching and mentoring the next generation of developers.
					</p>
					<p>
						Currently I work as a Backend Developer at <strong>Errandia</strong>, where I build Laravel APIs, automate CI/CD pipelines with Docker and GitHub Actions, and integrate AI into customer-facing products. I also contribute part-time to <strong>WhileSmart Ltd.</strong> on SourceAnt and open-source Laravel packages.
					</p>
					<p>
						Beyond writing code, I am a community builder. I co-organize the <strong>Buea WordPress Meetup</strong>, volunteer with the <strong>Foundation for a Human Internet</strong>, and speak at WordCamps across Africa.
					</p>
					<p style="margin-bottom: 0;">
						When I am not shipping software, I am teaching Web Design at the University of Buea or mentoring young developers entering the tech ecosystem.
					</p>
					<p style="margin-top: 1.5rem; margin-bottom: 0;">
						<a href="<?php echo esc_url( home_url( '/experience/' ) ); ?>" class="km-link-arrow">View my experience <span aria-hidden="true">→</span></a>
					</p>
				</div>
			</div>
		</div>
	</section>

	<section class="km-page-section km-page-section--alt">
		<div class="km-container km-reveal">
			<div class="km-page-section__header">
				<span class="km-section__eyebrow">What drives me</span>
				<h2 class="km-page-section__title">Build useful things, then help others build too.</h2>
			</div>
			<div class="km-bento">
				<div class="km-bento__card km-reveal">
					<div class="km-bento__icon"><i class="fas fa-server"></i></div>
					<h3 class="km-bento__title">Scalable backends</h3>
					<p class="km-bento__text">I design RESTful APIs and services that stay reliable as products grow, using Laravel, PHP, MySQL, Docker, and cloud infrastructure.</p>
				</div>
				<div class="km-bento__card km-reveal">
					<div class="km-bento__icon"><i class="fas fa-robot"></i></div>
					<h3 class="km-bento__title">AI integration</h3>
					<p class="km-bento__text">From AI-assisted code review to customer-support automation, I bring practical AI into real products without losing the human touch.</p>
				</div>
				<div class="km-bento__card km-reveal">
					<div class="km-bento__icon"><i class="fab fa-wordpress"></i></div>
					<h3 class="km-bento__title">WordPress craft</h3>
					<p class="km-bento__text">Custom themes, plugins, and blocks. I have contributed to the WordPress ecosystem as a developer, speaker, and community organizer.</p>
				</div>
				<div class="km-bento__card km-reveal">
					<div class="km-bento__icon"><i class="fas fa-users"></i></div>
					<h3 class="km-bento__title">Community</h3>
					<p class="km-bento__text">Organizing meetups, speaking at WordCamps, and mentoring interns keeps me connected to the people who make tech meaningful.</p>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
