<?php
/**
 * Front page template for Kofi Mokome child theme.
 *
 * @package KofiMokome
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$linkedin_url  = 'https://www.linkedin.com/in/kofimokome/';
$website_url   = 'https://kofimoko.me';
$email_address = 'kofimokome10@gmail.com';
$phone_number  = '+237670224092';
$github_url    = 'https://github.com/kofimokome';
$twitter_url   = 'https://twitter.com/kofimokome';
$medium_url    = 'https://medium.com/@kofimokome';
$wp_profile_url = 'https://profiles.wordpress.org/kofimokome/';
$instagram_url = 'https://www.instagram.com/kofimokome/';

$skills = array(
	'PHP / Laravel',
	'JavaScript / Node.js / React.js',
	'WordPress',
	'Python',
	'Artificial Intelligence',
	'AI Integration',
	'MySQL',
	'AWS',
	'Docker',
	'Git / GitHub CI/CD',
	'AI-assisted Coding',
	'HTML',
	'Community Leadership',
	'Teaching & Mentoring',
);

$experience = array(
	array(
		'role'     => 'Backend Developer',
		'company'  => 'Errandia',
		'location' => 'Buea, Cameroon',
		'dates'    => 'Apr 2025 – Present',
		'tags'     => array( 'Laravel', 'Docker', 'CI/CD', 'AI' ),
		'items'    => array(
			'Developed and maintained RESTful APIs using Laravel/PHP and MySQL, plus JavaScript-based interfaces and mobile applications.',
			'Automated CI/CD deployment using Docker and GitHub Actions, cutting deployment time by more than 50%.',
			'Introduced automated testing to improve code quality and reduce production bugs.',
			'Led the development and release of two SaaS products within six months.',
			'Incorporated AI-powered functionality to automate basic customer-support requests.',
		),
	),
	array(
		'role'     => 'Backend Developer (Part Time)',
		'company'  => 'WhileSmart Ltd.',
		'location' => 'Buea, Cameroon',
		'dates'    => 'Nov 2024 – Present',
		'tags'     => array( 'Laravel', 'Open Source', 'AI', 'Mentoring' ),
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
		'tags'     => array( 'Teaching', 'Laravel', 'MySQL' ),
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
		'tags'     => array( 'PHP', 'JavaScript', 'Docker', 'WordPress' ),
		'items'    => array(
			'Led development of the Zangi mobile application, reducing delivery timeline from ~6 months to 3 months.',
			'Collaborated with UI/UX designers to translate complex Figma designs into responsive websites.',
			'Built dynamic web applications utilizing PHP, JavaScript, and Docker.',
			'Architected custom WordPress solutions, including bespoke themes and plugins.',
		),
	),
);

$education = array(
	array(
		'degree' => 'Master of Technology in Computer Engineering',
		'abbr'   => 'MTech',
		'school' => 'University of Buea',
		'thesis' => 'AI Based System to Detect Drowsy Drivers',
		'dates'  => '2020 – 2023',
		'tags'   => array( 'AI', 'Computer Vision', 'Research' ),
	),
	array(
		'degree' => 'Bachelor of Technology in Computer Engineering',
		'abbr'   => 'BTech',
		'school' => 'University of Buea',
		'dates'  => '2018 – 2020',
		'tags'   => array( 'Software Engineering', 'Hardware' ),
	),
	array(
		'degree' => 'Higher National Diploma',
		'abbr'   => 'HND',
		'school' => 'University of Buea',
		'dates'  => '2015 – 2018',
		'tags'   => array( 'Networking', 'System Maintenance' ),
	),
);

$volunteering = array(
	array(
		'title'    => 'Buea WordPress Meetup Co-organizer',
		'location' => 'Buea',
		'dates'    => 'Jun 2023 – Present',
		'desc'     => 'Organize technical meetups, trained 10+ young people in website development, and built networking opportunities.',
		'icon'     => 'users',
	),
	array(
		'title'    => 'Foundation for a Human Internet',
		'location' => 'United States (remote)',
		'dates'    => 'Jan 2022 – Present',
		'desc'     => 'Manage AWS cloud infrastructure, DNS, SSL, CI/CD, led the humanID WordPress plugin and Discord bot development, and provide production support.',
		'icon'     => 'globe',
	),
	array(
		'title'    => 'WP Credits Mentor',
		'location' => 'Global (remote)',
		'dates'    => '2025 – Present',
		'desc'     => 'Mentor new and returning WordPress contributors through the WP Credits program, helping them land their first core and plugin contributions.',
		'icon'     => 'mentor',
	),
	array(
		'title'    => 'WordPress Plugin Check Contributor',
		'location' => 'Global (remote)',
		'dates'    => '2024 – Present',
		'desc'     => 'Contribute code, reviews and testing to the official Plugin Check plugin — the tool WordPress uses to help plugin developers follow best practices.',
		'icon'     => 'check',
	),
	array(
		'title'    => 'GatherPress Contributor',
		'location' => 'Global (remote)',
		'dates'    => '2024 – Present',
		'desc'     => 'Help build GatherPress, the open-source event-management plugin that powers modern WordPress meetups and conferences.',
		'icon'     => 'calendar',
	),
);

$honors = array(
	array(
		'title' => 'Yoast Diversity Fund',
		'org'   => 'Yoast',
		'year'  => '2026',
	),
	array(
		'title' => 'Yoast Care Fund',
		'org'   => 'Yoast',
		'year'  => '2025',
	),
	array(
		'title' => 'Yoast Diversity Fund',
		'org'   => 'Yoast',
		'year'  => '2024',
	),
);

$talks = array(
	array(
		'title'    => 'WordCamp Johannesburg',
		'event'    => 'Speaker',
		'location' => 'South Africa',
		'year'     => '2026',
	),
	array(
		'title'    => 'WordCamp Nairobi',
		'event'    => 'Speaker',
		'location' => 'Kenya',
		'year'     => '2024',
	),
	array(
		'title'    => 'WordCamp Jinja',
		'event'    => 'Speaker',
		'location' => 'Uganda',
		'year'     => '2024',
	),
);

$featured_projects = new WP_Query(
	array(
		'post_type'      => 'project',
		'posts_per_page' => 6,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'meta_query'     => array(
			array(
				'key'     => '_km_project_featured',
				'value'   => '1',
				'compare' => '=',
			),
		),
	)
);

if ( ! $featured_projects->have_posts() ) {
	$featured_projects = new WP_Query(
		array(
			'post_type'      => 'project',
			'posts_per_page' => 6,
			'orderby'        => 'menu_order',
			'order'          => 'ASC',
		)
	);
}
?>

<section class="km-hero" id="home">
	<canvas id="km-particles" class="km-particles" aria-hidden="true"></canvas>
	<div class="km-hero__bg"></div>
	<div class="km-container">
		<div class="km-hero__grid">
			<div class="km-hero__content">
				<span class="km-hero__eyebrow km-animate km-animate-1">Hi, I'm Kofi Mokome</span>
				<h1 class="km-hero__title km-animate km-animate-2">
					I build <em>scalable backends</em>,<br>
					integrate <em>AI</em>, and grow <em>tech communities.</em>
				</h1>
				<p class="km-hero__lead km-animate km-animate-3">
					Backend Developer, AI Integrator & Community Builder with hands-on experience across Laravel, WordPress, Python, AWS, Docker and AI-assisted engineering.
				</p>
				<div class="km-hero__actions km-animate km-animate-4">
					<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="km-btn km-btn--primary">About me <span aria-hidden="true">→</span></a>
					<a href="#contact" class="km-btn km-btn--outline">Let's talk</a>
				</div>
				<div class="km-hero__meta km-animate km-animate-5">
					<span>📍 Buea, Cameroon</span>
					<span>🌐 Open to remote & consulting</span>
				</div>
			</div>

			<div class="km-hero__brand km-animate km-animate-3">
				<div class="km-hero__logo" aria-hidden="true">
					<img src="<?php echo esc_url( KOFIMOKOME_URI . '/assets/img/kofimokome-logo.png' ); ?>" alt="Kofi Mokome logo">
				</div>
				<div class="km-hero__socials">
					<a href="<?php echo esc_url( $github_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="GitHub"><i class="fab fa-github" aria-hidden="true"></i></a>
					<a href="<?php echo esc_url( $wp_profile_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="WordPress.org profile"><i class="fab fa-wordpress" aria-hidden="true"></i></a>
					<a href="<?php echo esc_url( $medium_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Medium"><i class="fab fa-medium" aria-hidden="true"></i></a>
					<a href="<?php echo esc_url( $twitter_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="X / Twitter"><i class="fab fa-x-twitter" aria-hidden="true"></i></a>
					<a href="<?php echo esc_url( $linkedin_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
					<a href="<?php echo esc_url( $instagram_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fab fa-instagram" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>

	<div class="km-hero__floating" aria-hidden="true">
		<span class="km-float-badge km-float-badge--random" style="top:12%; left:6%; animation-delay:0s;">
			<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
			Laravel
		</span>
		<span class="km-float-badge km-float-badge--random" style="bottom:18%; left:8%; animation-delay:-2s;">
			<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>
			Docker
		</span>
		<span class="km-float-badge km-float-badge--random" style="top:55%; left:4%; animation-delay:-5s;">
			<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
			MySQL
		</span>
		<span class="km-float-badge km-float-badge--random" style="top:10%; right:6%; animation-delay:-1s;">
			<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"></path><path d="M2 17l10 5 10-5"></path><path d="M2 12l10 5 10-5"></path></svg>
			AI Integration
		</span>
		<span class="km-float-badge km-float-badge--random" style="top:45%; right:4%; animation-delay:-3s;">
			<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
			WordPress
		</span>
		<span class="km-float-badge km-float-badge--random" style="bottom:12%; right:8%; animation-delay:-4s;">
			<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"></path></svg>
			AWS
		</span>
	</div>
</section>

<section class="km-marquee" aria-label="Tech stack">
	<div class="km-marquee__track">
		<?php
		$items = array();
		foreach ( $skills as $skill ) {
			$items[] = '<span class="km-marquee__item">' . esc_html( $skill ) . '</span>';
		}
		$marquee = implode( '', $items );
		// Duplicate for seamless loop.
		echo $marquee . $marquee; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		?>
	</div>
</section>

<section class="km-section" id="experience">
	<div class="km-container">
		<div class="km-section__header km-reveal">
			<span class="km-section__eyebrow">Experience</span>
			<h2 class="km-section__title">Where I've made impact</h2>
			<p class="km-section__intro">
				A track record of shipping production systems, leading product releases, and introducing AI and automation into development workflows.
			</p>
		</div>

		<div class="km-work-list">
			<?php foreach ( $experience as $job ) : ?>
				<article class="km-work-row km-reveal">
					<div class="km-work-row__main">
						<h3 class="km-work-row__title"><?php echo esc_html( $job['role'] ); ?></h3>
						<div class="km-work-row__meta">
							<strong><?php echo esc_html( $job['company'] ); ?></strong>
							<span><?php echo esc_html( $job['location'] ); ?></span>
							<span class="km-work-row__dates"><?php echo esc_html( $job['dates'] ); ?></span>
						</div>
					</div>
					<div class="km-work-row__body">
						<ul class="km-work-row__items">
							<?php foreach ( $job['items'] as $item ) : ?>
								<li><?php echo esc_html( $item ); ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="km-work-row__aside">
						<div class="km-work-row__tags">
							<?php foreach ( $job['tags'] as $tag ) : ?>
								<span class="km-tag"><?php echo esc_html( $tag ); ?></span>
							<?php endforeach; ?>
						</div>
						<a href="<?php echo esc_url( home_url( '/experience/' ) ); ?>" class="km-arrow" aria-label="View experience details">
							<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
						</a>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="km-reveal" style="margin-top: 3rem;">
			<a href="<?php echo esc_url( home_url( '/experience/' ) ); ?>" class="km-link-arrow">See full experience <span aria-hidden="true">→</span></a>
		</div>
	</div>
</section>

<section class="km-section km-section--alt" id="education">
	<div class="km-container">
		<div class="km-section__header km-reveal">
			<span class="km-section__eyebrow">Education</span>
			<h2 class="km-section__title">Academic background</h2>
		</div>

		<div class="km-edu-grid">
			<?php foreach ( $education as $edu ) : ?>
				<article class="km-edu-card km-reveal">
					<div class="km-edu-card__top">
						<span class="km-edu-card__label"><?php echo esc_html( $edu['degree'] ); ?></span>
						<span class="km-edu-card__dates"><?php echo esc_html( $edu['dates'] ); ?></span>
					</div>
					<div class="km-edu-card__abbr"><?php echo esc_html( $edu['abbr'] ); ?></div>
					<div class="km-edu-card__school"><?php echo esc_html( $edu['school'] ); ?></div>
					<?php if ( ! empty( $edu['thesis'] ) ) : ?>
						<p class="km-edu-card__thesis"><?php echo esc_html( $edu['thesis'] ); ?></p>
					<?php endif; ?>
					<div class="km-edu-card__tags">
						<?php foreach ( $edu['tags'] as $tag ) : ?>
							<span class="km-tag km-tag--outline"><?php echo esc_html( $tag ); ?></span>
						<?php endforeach; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="km-section" id="community">
	<div class="km-container">
		<div class="km-section__header km-reveal">
			<span class="km-section__eyebrow">Community</span>
			<h2 class="km-section__title">Giving back to the ecosystem</h2>
		</div>

		<div class="km-bento">
			<?php foreach ( $volunteering as $vol ) : ?>
				<article class="km-bento__card km-reveal">
					<div class="km-bento__icon">
						<?php if ( 'users' === $vol['icon'] ) : ?>
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
						<?php elseif ( 'mentor' === $vol['icon'] ) : ?>
							<i class="fas fa-hands-helping" aria-hidden="true"></i>
						<?php elseif ( 'check' === $vol['icon'] ) : ?>
							<i class="fas fa-clipboard-check" aria-hidden="true"></i>
						<?php elseif ( 'calendar' === $vol['icon'] ) : ?>
							<i class="fas fa-calendar-alt" aria-hidden="true"></i>
						<?php else : ?>
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
						<?php endif; ?>
					</div>
					<h3 class="km-bento__title"><?php echo esc_html( $vol['title'] ); ?></h3>
					<p class="km-bento__meta"><?php echo esc_html( $vol['location'] ); ?> · <?php echo esc_html( $vol['dates'] ); ?></p>
					<p class="km-bento__text"><?php echo esc_html( $vol['desc'] ); ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<section class="km-section km-section--alt" id="recognition">
	<div class="km-container">
		<div class="km-section__header km-reveal">
			<span class="km-section__eyebrow">Recognition</span>
			<h2 class="km-section__title">Honours, awards & speaking</h2>
		</div>

		<div class="km-section__row km-reveal">
			<h3 class="km-section__subTitle">Honours & Awards</h3>
			<div class="km-scroll">
				<?php foreach ( $honors as $honor ) : ?>
					<article class="km-recognition-card">
						<div class="km-recognition-card__year"><?php echo esc_html( $honor['year'] ); ?></div>
						<div class="km-recognition-card__body">
							<h4><?php echo esc_html( $honor['title'] ); ?></h4>
							<p><?php echo esc_html( $honor['org'] ); ?></p>
						</div>
						<div class="km-recognition-card__icon">🏆</div>
					</article>
				<?php endforeach; ?>
			</div>
			<p style="margin-top:1rem;">
				<a href="<?php echo esc_url( home_url( '/awards/' ) ); ?>" class="km-link-arrow">All awards <span aria-hidden="true">→</span></a>
			</p>
		</div>

		<div class="km-section__row km-reveal">
			<h3 class="km-section__subTitle">Speaking</h3>
			<div class="km-scroll">
				<?php foreach ( $talks as $talk ) : ?>
					<article class="km-recognition-card">
						<div class="km-recognition-card__year"><?php echo esc_html( $talk['year'] ); ?></div>
						<div class="km-recognition-card__body">
							<h4><?php echo esc_html( $talk['title'] ); ?></h4>
							<p><?php echo esc_html( $talk['event'] ); ?> · <?php echo esc_html( $talk['location'] ); ?></p>
						</div>
						<div class="km-recognition-card__icon">🎤</div>
					</article>
				<?php endforeach; ?>
			</div>
			<p style="margin-top:1rem;">
				<a href="<?php echo esc_url( home_url( '/speaking/' ) ); ?>" class="km-link-arrow">All speaking engagements <span aria-hidden="true">→</span></a>
			</p>
		</div>
	</div>
</section>

<section class="km-section" id="open-source">
	<div class="km-container">
		<div class="km-section__header km-reveal">
			<span class="km-section__eyebrow">Open Source</span>
			<h2 class="km-section__title">Projects I've contributed to</h2>
			<p class="km-section__intro">
				From AI-assisted code review to WordPress plugins and developer tooling, here is a sample of the open-source and product work I am involved in.
			</p>
		</div>

		<div class="km-work-list">
			<?php
			if ( $featured_projects->have_posts() ) :
				while ( $featured_projects->have_posts() ) :
					$featured_projects->the_post();
					$tags = kofimokome_get_project_tags();
					$url  = kofimokome_get_project_url();
					?>
					<article class="km-work-row km-reveal">
						<div class="km-work-row__main">
							<h3 class="km-work-row__title"><?php the_title(); ?></h3>
							<p class="km-work-row__summary"><?php echo esc_html( wp_trim_words( get_the_content(), 22 ) ); ?></p>
						</div>
						<div class="km-work-row__aside">
							<div class="km-work-row__tags">
								<?php foreach ( $tags as $tag ) : ?>
									<span class="km-tag"><?php echo esc_html( $tag ); ?></span>
								<?php endforeach; ?>
							</div>
							<?php if ( $url ) : ?>
								<a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" class="km-arrow" aria-label="View <?php the_title_attribute(); ?>">
									<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
								</a>
							<?php endif; ?>
						</div>
					</article>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>

		<div class="km-reveal" style="margin-top: 3rem;">
			<a href="<?php echo esc_url( home_url( '/open-source/' ) ); ?>" class="km-link-arrow">View open-source work <span aria-hidden="true">→</span></a>
		</div>
	</div>
</section>

<section class="km-section km-section--alt" id="blog">
	<div class="km-container">
		<div class="km-section__header km-reveal">
			<span class="km-section__eyebrow">From the blog</span>
			<h2 class="km-section__title">Conferences & community reflections</h2>
		</div>

		<div class="km-blog-grid">
			<?php
			$latest = new WP_Query( array( 'posts_per_page' => 4 ) );
			if ( $latest->have_posts() ) :
				while ( $latest->have_posts() ) :
					$latest->the_post();
					?>
					<article class="km-blog-card km-reveal">
						<div class="km-blog-card__meta">
							<span class="km-tag km-tag--outline">Conferences</span>
							<time datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
						</div>
						<h3 class="km-blog-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
					</article>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<p><?php esc_html_e( 'No posts yet.', 'kofimokome' ); ?></p>
			<?php endif; ?>
		</div>
	</div>
</section>

<section class="km-section km-contact" id="contact">
	<div class="km-container">
		<div class="km-contact__grid">
			<div class="km-reveal">
				<span class="km-section__eyebrow">Get in touch</span>
				<h2 class="km-section__title">Let's build something great together.</h2>
				<p class="km-section__intro">
					Open to backend engineering roles, AI integration projects, consulting, speaking opportunities, and community collaborations.
				</p>
				<div class="km-contact__direct">
					<a href="mailto:<?php echo esc_attr( $email_address ); ?>" class="km-link-arrow"><?php echo esc_html( $email_address ); ?></a>
					<a href="tel:<?php echo esc_attr( $phone_number ); ?>" class="km-link-arrow">+237 670 224 092</a>
					<a href="<?php echo esc_url( $website_url ); ?>" target="_blank" rel="noopener noreferrer" class="km-link-arrow">kofimoko.me</a>
				</div>
			</div>
			<div class="km-reveal">
				<h3 class="km-section__subTitle">Online profiles</h3>
				<div class="km-socials" style="gap:1rem; flex-wrap:wrap;">
					<a href="<?php echo esc_url( $linkedin_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
					<a href="<?php echo esc_url( $github_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="GitHub"><i class="fab fa-github" aria-hidden="true"></i></a>
					<a href="<?php echo esc_url( $twitter_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="X / Twitter"><i class="fab fa-x-twitter" aria-hidden="true"></i></a>
					<a href="<?php echo esc_url( $medium_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Medium"><i class="fab fa-medium" aria-hidden="true"></i></a>
					<a href="<?php echo esc_url( $wp_profile_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="WordPress.org profile"><i class="fab fa-wordpress" aria-hidden="true"></i></a>
					<a href="<?php echo esc_url( $instagram_url ); ?>" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fab fa-instagram" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
