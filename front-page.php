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

$featured_projects = new WP_Query(
	array(
		'post_type'      => 'project',
		'posts_per_page' => 6,
		'orderby'        => 'menu_order',
		'order'          => 'DESC',
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
			'order'          => 'DESC',
		)
	);
}

$featured_experiences = new WP_Query(
	array(
		'post_type'      => 'experience',
		'posts_per_page' => 3,
		'orderby'        => 'menu_order',
		'order'          => 'DESC',
		'meta_query'     => array(
			array(
				'key'     => '_km_experience_featured',
				'value'   => '1',
				'compare' => '=',
			),
		),
	)
);

if ( ! $featured_experiences->have_posts() ) {
	$featured_experiences = new WP_Query(
		array(
			'post_type'      => 'experience',
			'posts_per_page' => 3,
			'orderby'        => 'menu_order',
			'order'          => 'DESC',
		)
	);
}

$featured_community = new WP_Query(
	array(
		'post_type'      => 'community',
		'posts_per_page' => 6,
		'orderby'        => 'menu_order',
		'order'          => 'DESC',
		'meta_query'     => array(
			array(
				'key'     => '_km_community_featured',
				'value'   => '1',
				'compare' => '=',
			),
		),
	)
);

if ( ! $featured_community->have_posts() ) {
	$featured_community = new WP_Query(
		array(
			'post_type'      => 'community',
			'posts_per_page' => 6,
			'orderby'        => 'menu_order',
			'order'          => 'DESC',
		)
	);
}

$featured_education = new WP_Query(
	array(
		'post_type'      => 'education',
		'posts_per_page' => 6,
		'orderby'        => 'menu_order',
		'order'          => 'DESC',
		'meta_query'     => array(
			array(
				'key'     => '_km_education_featured',
				'value'   => '1',
				'compare' => '=',
			),
		),
	)
);

if ( ! $featured_education->have_posts() ) {
	$featured_education = new WP_Query(
		array(
			'post_type'      => 'education',
			'posts_per_page' => 6,
			'orderby'        => 'menu_order',
			'order'          => 'DESC',
		)
	);
}

$featured_awards = new WP_Query(
	array(
		'post_type'      => 'award',
		'posts_per_page' => 6,
		'orderby'        => 'menu_order',
		'order'          => 'DESC',
		'meta_query'     => array(
			array(
				'key'     => '_km_award_featured',
				'value'   => '1',
				'compare' => '=',
			),
		),
	)
);

if ( ! $featured_awards->have_posts() ) {
	$featured_awards = new WP_Query(
		array(
			'post_type'      => 'award',
			'posts_per_page' => 6,
			'orderby'        => 'menu_order',
			'order'          => 'DESC',
		)
	);
}

$featured_speaking = new WP_Query(
	array(
		'post_type'      => 'speaking',
		'posts_per_page' => 6,
		'orderby'        => 'menu_order',
		'order'          => 'DESC',
		'meta_query'     => array(
			array(
				'key'     => '_km_speaking_featured',
				'value'   => '1',
				'compare' => '=',
			),
		),
	)
);

if ( ! $featured_speaking->have_posts() ) {
	$featured_speaking = new WP_Query(
		array(
			'post_type'      => 'speaking',
			'posts_per_page' => 6,
			'orderby'        => 'menu_order',
			'order'          => 'DESC',
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

	<?php
	$hero_badges = new WP_Query(
		array(
			'post_type'      => 'hero_badge',
			'posts_per_page' => 6,
			'orderby'        => 'menu_order',
			'order'          => 'DESC',
		)
	);
	$badge_positions = array(
		array( 'top:12%; left:6%;', '0s' ),
		array( 'bottom:18%; left:8%;', '-2s' ),
		array( 'top:55%; left:4%;', '-5s' ),
		array( 'top:10%; right:6%;', '-1s' ),
		array( 'top:45%; right:4%;', '-3s' ),
		array( 'bottom:12%; right:8%;', '-4s' ),
	);
	?>
	<div class="km-hero__floating" aria-hidden="true">
		<?php
		$i = 0;
		if ( $hero_badges->have_posts() ) :
			while ( $hero_badges->have_posts() ) :
				$hero_badges->the_post();
				$icon     = kofimokome_get_hero_badge_icon();
				$position = isset( $badge_positions[ $i ] ) ? $badge_positions[ $i ][0] : 'top:50%; left:50%;';
				$delay    = isset( $badge_positions[ $i ] ) ? $badge_positions[ $i ][1] : '0s';
				?>
				<span class="km-float-badge km-float-badge--random" style="<?php echo esc_attr( $position ); ?> animation-delay:<?php echo esc_attr( $delay ); ?>">
					<i class="<?php echo esc_attr( $icon ); ?>" aria-hidden="true"></i>
					<?php the_title(); ?>
				</span>
			<?php
				$i++;
			endwhile;
			wp_reset_postdata();
		endif;
		?>
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
			<?php
			if ( $featured_experiences->have_posts() ) :
				while ( $featured_experiences->have_posts() ) :
					$featured_experiences->the_post();
					$company  = kofimokome_get_experience_company();
					$location = kofimokome_get_experience_location();
					$dates    = kofimokome_get_experience_dates();
					$items    = kofimokome_get_experience_items();
					$tags     = kofimokome_get_experience_tags();
					?>
					<article class="km-work-row km-reveal">
						<div class="km-work-row__main">
							<h3 class="km-work-row__title"><?php the_title(); ?></h3>
							<div class="km-work-row__meta">
								<strong><?php echo esc_html( $company ); ?></strong>
								<span><?php echo esc_html( $location ); ?></span>
								<span class="km-work-row__dates"><?php echo esc_html( $dates ); ?></span>
							</div>
						</div>
						<div class="km-work-row__body">
							<ul class="km-work-row__items">
								<?php foreach ( array_slice( $items, 0, 5 ) as $item ) : ?>
									<li><?php echo esc_html( $item ); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="km-work-row__aside">
							<div class="km-work-row__tags">
								<?php foreach ( $tags as $tag ) : ?>
									<span class="km-tag"><?php echo esc_html( $tag ); ?></span>
								<?php endforeach; ?>
							</div>
							<a href="<?php echo esc_url( home_url( '/experience/' ) ); ?>" class="km-arrow" aria-label="View experience details">
								<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
							</a>
						</div>
					</article>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
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
			<?php
			if ( $featured_education->have_posts() ) :
				while ( $featured_education->have_posts() ) :
					$featured_education->the_post();
					$abbr   = kofimokome_get_education_abbr();
					$school = kofimokome_get_education_school();
					$dates  = kofimokome_get_education_dates();
					$thesis = kofimokome_get_education_thesis();
					$tags   = kofimokome_get_education_tags();
					?>
					<article class="km-edu-card km-reveal">
						<div class="km-edu-card__top">
							<span class="km-edu-card__label"><?php the_title(); ?></span>
							<span class="km-edu-card__dates"><?php echo esc_html( $dates ); ?></span>
						</div>
						<div class="km-edu-card__abbr"><?php echo esc_html( $abbr ); ?></div>
						<div class="km-edu-card__school"><?php echo esc_html( $school ); ?></div>
						<?php if ( $thesis ) : ?>
							<p class="km-edu-card__thesis"><?php echo esc_html( $thesis ); ?></p>
						<?php endif; ?>
						<div class="km-edu-card__tags">
							<?php foreach ( $tags as $tag ) : ?>
								<span class="km-tag km-tag--outline"><?php echo esc_html( $tag ); ?></span>
							<?php endforeach; ?>
						</div>
					</article>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>

		<div class="km-reveal" style="margin-top: 3rem;">
			<a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="km-link-arrow">View full academic background <span aria-hidden="true">→</span></a>
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
			<?php
			if ( $featured_community->have_posts() ) :
				while ( $featured_community->have_posts() ) :
					$featured_community->the_post();
					$icon     = kofimokome_get_community_icon();
					$location = kofimokome_get_community_location();
					$dates    = kofimokome_get_community_dates();
					$role     = kofimokome_get_community_role();
					$meta     = array_filter( array( $role, $location, $dates ) );
					?>
					<article class="km-bento__card km-reveal">
						<div class="km-bento__icon">
							<i class="fas <?php echo esc_attr( $icon ); ?>" aria-hidden="true"></i>
						</div>
						<h3 class="km-bento__title"><?php the_title(); ?></h3>
						<p class="km-bento__meta"><?php echo esc_html( implode( ' · ', $meta ) ); ?></p>
						<p class="km-bento__text"><?php echo esc_html( wp_trim_words( get_the_content(), 22 ) ); ?></p>
					</article>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>

		<div class="km-reveal" style="margin-top: 3rem;">
			<a href="<?php echo esc_url( home_url( '/open-source/' ) ); ?>" class="km-link-arrow">View all community work <span aria-hidden="true">→</span></a>
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
				<?php
				if ( $featured_awards->have_posts() ) :
					while ( $featured_awards->have_posts() ) :
						$featured_awards->the_post();
						$year = kofimokome_get_award_year();
						$org  = kofimokome_get_award_organization();
						?>
						<article class="km-recognition-card">
							<div class="km-recognition-card__year"><?php echo esc_html( $year ); ?></div>
							<div class="km-recognition-card__body">
								<h4><?php the_title(); ?></h4>
								<p><?php echo esc_html( $org ); ?></p>
							</div>
							<div class="km-recognition-card__icon">🏆</div>
						</article>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
			<p style="margin-top:1rem;">
				<a href="<?php echo esc_url( home_url( '/awards/' ) ); ?>" class="km-link-arrow">All awards <span aria-hidden="true">→</span></a>
			</p>
		</div>

		<div class="km-section__row km-reveal">
			<h3 class="km-section__subTitle">Speaking</h3>
			<div class="km-scroll">
				<?php
				if ( $featured_speaking->have_posts() ) :
					while ( $featured_speaking->have_posts() ) :
						$featured_speaking->the_post();
						$year     = kofimokome_get_speaking_year();
						$location = kofimokome_get_speaking_location();
						?>
						<article class="km-recognition-card">
							<div class="km-recognition-card__year"><?php echo esc_html( $year ); ?></div>
							<div class="km-recognition-card__body">
								<h4><?php the_title(); ?></h4>
								<p><?php echo esc_html( $location ); ?></p>
							</div>
							<div class="km-recognition-card__icon">🎤</div>
						</article>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
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
				<div class="km-contact__socials" style="margin-top: 2rem;">
					<h3 class="km-section__subTitle" style="margin-bottom: 1rem;">Online profiles</h3>
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
			<div class="km-reveal km-contact__form">
				<?php echo do_shortcode( '[contact-form-7 id="109" title="Portfolio contact form"]' ); ?>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
