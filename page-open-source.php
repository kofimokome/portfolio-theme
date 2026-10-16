<?php
/**
 * Open Source page template.
 *
 * @package KofiMokome
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$featured_projects = new WP_Query(
	array(
		'post_type'      => 'project',
		'posts_per_page' => 4,
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

$community = array(
	array(
		'title' => 'WordPress Plugin Check',
		'meta'  => 'Core contributor',
		'desc'  => 'Contribute code, reviews and testing to the official Plugin Check plugin — the tool WordPress uses to help plugin developers follow best practices.',
		'icon'  => 'fa-clipboard-check',
		'link'  => 'https://github.com/wordpress/plugin-check',
	),
	array(
		'title' => 'GatherPress',
		'meta'  => 'Community contributor',
		'desc'  => 'Help build GatherPress, the open-source event-management plugin that powers modern WordPress meetups and conferences.',
		'icon'  => 'fa-calendar-alt',
		'link'  => 'https://github.com/GatherPress/gatherpress',
	),
	array(
		'title' => 'WP Credits Mentor',
		'meta'  => 'Mentor',
		'desc'  => 'Mentor new and returning WordPress contributors through the WP Credits program, helping them land their first core and plugin contributions.',
		'icon'  => 'fa-hands-helping',
		'link'  => 'https://make.wordpress.org/',
	),
	array(
		'title' => 'Buea WordPress Meetup',
		'meta'  => 'Co-organizer',
		'desc'  => 'Organize technical meetups, train young developers and build networking opportunities in the local WordPress community.',
		'icon'  => 'fa-users',
		'link'  => 'https://www.meetup.com/buea-wordpress-meetup/',
	),
);
?>

<main class="km-content km-page">
	<section class="km-page-hero km-reveal">
		<div class="km-page-hero__inner">
			<span class="km-page-hero__eyebrow">Open Source</span>
			<h1 class="km-page-hero__title">Projects built to solve <em>real</em> problems.</h1>
			<p class="km-page-hero__intro">
				A selection of open-source products, plugins and packages I work on. For the full list, including Laravel packages and experiments, see the projects page.
			</p>

			<div class="km-page-hero__actions">
				<a href="https://github.com/kofimokome" class="km-btn km-btn--primary" target="_blank" rel="noopener">
					<i class="fab fa-github"></i> GitHub profile
				</a>
				<a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="km-btn km-btn--outline">View all projects</a>
			</div>

			<div class="km-page-hero__stats">
				<div class="km-stat">
					<div class="km-stat__value"><?php echo esc_html( wp_count_posts( 'project' )->publish ); ?></div>
					<div class="km-stat__label">Projects</div>
				</div>
				<div class="km-stat">
					<div class="km-stat__value">4</div>
					<div class="km-stat__label">Communities</div>
				</div>
				<div class="km-stat">
					<div class="km-stat__value">2</div>
					<div class="km-stat__label">Own plugins</div>
				</div>
			</div>
		</div>
	</section>

	<section class="km-page-section">
		<div class="km-container">
			<div class="km-page-section__header km-reveal">
				<span class="km-section__eyebrow">Highlights</span>
				<h2 class="km-page-section__title">Featured open-source work</h2>
			</div>
			<?php if ( $featured_projects->have_posts() ) : ?>
				<div class="km-page-grid">
					<?php
					while ( $featured_projects->have_posts() ) :
						$featured_projects->the_post();
						$tagline = kofimokome_get_project_tagline();
						$url     = kofimokome_get_project_url();
						$tags    = kofimokome_get_project_tags();
						$image   = kofimokome_get_project_image();
						?>
						<article class="km-project-card km-reveal">
							<div class="km-project-card__media">
								<img src="<?php echo esc_url( $image ); ?>" alt="<?php the_title_attribute(); ?> screenshot" loading="lazy" decoding="async">
							</div>
							<div class="km-project-card__body">
								<h2 class="km-project-card__title"><?php the_title(); ?></h2>
								<?php if ( $tagline ) : ?>
									<div class="km-project-card__meta"><?php echo esc_html( $tagline ); ?></div>
								<?php endif; ?>
								<p class="km-project-card__desc"><?php echo esc_html( wp_trim_words( get_the_content(), 28 ) ); ?></p>
								<div class="km-project-card__footer">
									<?php if ( $tags ) : ?>
										<div class="km-skills">
											<?php foreach ( $tags as $t ) : ?>
												<span class="km-skill"><?php echo esc_html( $t ); ?></span>
											<?php endforeach; ?>
										</div>
									<?php endif; ?>
									<?php if ( $url ) : ?>
										<a href="<?php echo esc_url( $url ); ?>" class="km-arrow" target="_blank" rel="noopener" aria-label="View <?php the_title_attribute(); ?>">
											<i class="fas fa-arrow-right"></i>
										</a>
									<?php endif; ?>
								</div>
							</div>
						</article>
					<?php endwhile; ?>
				</div>
			<?php else : ?>
				<p><?php esc_html_e( 'No featured projects yet.', 'kofimokome' ); ?></p>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>

			<div class="km-reveal" style="margin-top: 3rem; text-align: center;">
				<a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="km-btn km-btn--primary">View all projects <span aria-hidden="true">→</span></a>
			</div>
		</div>
	</section>

	<section class="km-page-section km-page-section--alt">
		<div class="km-container">
			<div class="km-page-section__header km-reveal">
				<span class="km-section__eyebrow">Community</span>
				<h2 class="km-page-section__title">Giving back to the ecosystem</h2>
			</div>
			<div class="km-bento">
				<?php foreach ( $community as $item ) : ?>
					<article class="km-bento__card km-reveal">
						<div class="km-bento__icon">
							<i class="fas <?php echo esc_attr( $item['icon'] ); ?>"></i>
						</div>
						<h3 class="km-bento__title"><?php echo esc_html( $item['title'] ); ?></h3>
						<p class="km-bento__meta"><?php echo esc_html( $item['meta'] ); ?></p>
						<p class="km-bento__text"><?php echo esc_html( $item['desc'] ); ?></p>
						<?php if ( ! empty( $item['link'] ) ) : ?>
							<p style="margin-top: 1rem; margin-bottom: 0;">
								<a href="<?php echo esc_url( $item['link'] ); ?>" class="km-link-arrow" target="_blank" rel="noopener">
									View on GitHub <span aria-hidden="true">→</span>
								</a>
							</p>
						<?php endif; ?>
					</article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
