<?php
/**
 * Projects page template.
 *
 * @package KofiMokome
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$projects_query = new WP_Query(
	array(
		'post_type'      => 'project',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'DESC',
	)
);
?>

<main class="km-content km-page">
	<section class="km-page-hero km-reveal">
		<div class="km-page-hero__inner">
			<span class="km-page-hero__eyebrow">Projects</span>
			<h1 class="km-page-hero__title">A gallery of <em>shipping</em> experiments.</h1>
			<p class="km-page-hero__intro">
				From WordPress plugins and Laravel packages to AI-assisted tooling and bots — a complete list of the open-source and product work I am involved in.
			</p>

			<div class="km-page-hero__actions">
				<a href="https://github.com/kofimokome" class="km-btn km-btn--primary" target="_blank" rel="noopener">
					<i class="fab fa-github"></i> GitHub profile
				</a>
				<a href="<?php echo esc_url( home_url( '/open-source/' ) ); ?>" class="km-btn km-btn--outline">Community work</a>
			</div>

			<div class="km-page-hero__stats">
				<div class="km-stat">
					<div class="km-stat__value"><?php echo esc_html( $projects_query->found_posts ); ?></div>
					<div class="km-stat__label">Projects</div>
				</div>
				<div class="km-stat">
					<div class="km-stat__value">2</div>
					<div class="km-stat__label">Own plugins</div>
				</div>
				<div class="km-stat">
					<div class="km-stat__value">4</div>
					<div class="km-stat__label">Laravel packages</div>
				</div>
			</div>
		</div>
	</section>

	<section class="km-page-section">
		<div class="km-container">
			<?php if ( $projects_query->have_posts() ) : ?>
				<div class="km-page-grid">
					<?php
					while ( $projects_query->have_posts() ) :
						$projects_query->the_post();
						$tagline = kofimokome_get_project_tagline();
						$url     = kofimokome_get_project_url();
						$tags    = kofimokome_get_project_tags();
						$image   = kofimokome_get_project_image();
						?>
						<article class="km-project-card km-reveal">
							<div class="km-project-card__media">
								<img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?> screenshot" loading="lazy" decoding="async">
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
				<p><?php esc_html_e( 'No projects yet.', 'kofimokome' ); ?></p>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</section>
</main>

<?php
get_footer();
