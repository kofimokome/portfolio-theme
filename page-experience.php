<?php
/**
 * Experience page template.
 *
 * @package KofiMokome
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$experience = array(
	array(
		'role'     => 'Backend Developer',
		'company'  => 'Errandia',
		'location' => 'Buea, Cameroon',
		'dates'    => 'Apr 2025 – Present',
		'items'    => array(
			'Developed and maintained RESTful APIs using Laravel/PHP and MySQL, plus JavaScript-based interfaces and mobile applications.',
			'Automated CI/CD deployment using Docker and GitHub Actions, cutting deployment time by more than 50%.',
			'Introduced automated testing to improve code quality and reduce production bugs.',
			'Led the development and release of two SaaS products within six months.',
			'Incorporated AI-powered functionality to automate basic customer-support requests.',
			'Used AI-assisted coding tools to accelerate software delivery.',
		),
	),
	array(
		'role'     => 'Backend Developer (Part Time)',
		'company'  => 'WhileSmart Ltd.',
		'location' => 'Buea, Cameroon',
		'dates'    => 'Nov 2024 – Present',
		'items'    => array(
			'Co-developed SourceAnt, an AI-assisted code-review solution.',
			'Develop and maintain Laravel packages and robust APIs for open-source and proprietary projects.',
			'Supervise and mentor interns in software development and open-source engineering.',
			'Translate business requirements into Software Requirements Specifications and technical solutions.',
		),
	),
	array(
		'role'     => 'University Teaching Assistant',
		'company'  => 'University of Buea',
		'location' => 'Buea, Cameroon',
		'dates'    => 'Dec 2022 – Sep 2026',
		'items'    => array(
			'Instruct level 200 students in Web Design, covering frontend and backend concepts.',
			'Led the development of UB Logbook, a digital application for tracking lecturer attendance.',
			'Generated academic timetables and supported administrative operations for the HND program.',
			'Contributed to the development of the new national HND syllabus.',
		),
	),
	array(
		'role'     => 'Web Developer',
		'company'  => 'Zinger Systems Ltd',
		'location' => 'Buea, Cameroon',
		'dates'    => 'Nov 2021 – Nov 2025',
		'items'    => array(
			'Led development of the Zangi mobile application, reducing delivery timeline from ~6 months to 3 months.',
			'Collaborated with UI/UX designers to translate complex Figma designs into responsive websites.',
			'Built dynamic web applications utilizing PHP, JavaScript, and Docker.',
			'Architected custom WordPress solutions, including bespoke themes and plugins.',
			'Designed and integrated secure REST APIs.',
		),
	),
);
?>

<main class="km-content km-page">
	<section class="km-page-hero km-reveal">
		<div class="km-page-hero__inner">
			<span class="km-page-hero__eyebrow">Career</span>
			<h1 class="km-page-hero__title">A track record of shipping <em>reliable</em> systems.</h1>
			<p class="km-page-hero__intro">
				A timeline of roles where I have built APIs, shipped products, introduced AI-powered features, and mentored teams.
			</p>

			<div class="km-page-hero__stats">
				<div class="km-stat">
					<div class="km-stat__value">4</div>
					<div class="km-stat__label">Roles</div>
				</div>
				<div class="km-stat">
					<div class="km-stat__value">50%</div>
					<div class="km-stat__label">Deploy time cut</div>
				</div>
				<div class="km-stat">
					<div class="km-stat__value">2</div>
					<div class="km-stat__label">SaaS products</div>
				</div>
				<div class="km-stat">
					<div class="km-stat__value">∞</div>
					<div class="km-stat__label">Cups of coffee</div>
				</div>
			</div>
		</div>
	</section>

	<section class="km-page-section">
		<div class="km-container">
			<div class="km-timeline">
				<?php foreach ( $experience as $i => $job ) : ?>
					<article class="km-timeline__item km-reveal">
						<div class="km-timeline__dot" aria-hidden="true"></div>
						<div class="km-timeline__header">
							<div>
								<h2 class="km-timeline__title"><?php echo esc_html( $job['role'] ); ?></h2>
								<div class="km-timeline__company"><?php echo esc_html( $job['company'] ); ?> · <?php echo esc_html( $job['location'] ); ?></div>
							</div>
							<span class="km-timeline__dates"><?php echo esc_html( $job['dates'] ); ?></span>
						</div>
						<ul class="km-timeline__list">
							<?php foreach ( $job['items'] as $item ) : ?>
								<li><?php echo esc_html( $item ); ?></li>
							<?php endforeach; ?>
						</ul>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
