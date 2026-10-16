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

$experience_query = new WP_Query(
	array(
		'post_type'      => 'experience',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'DESC',
	)
);

$role_count = wp_count_posts( 'experience' )->publish;
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
					<div class="km-stat__value"><?php echo esc_html( $role_count ); ?></div>
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
			<?php if ( $experience_query->have_posts() ) : ?>
				<div class="km-timeline">
					<?php
					while ( $experience_query->have_posts() ) :
						$experience_query->the_post();
						$company  = kofimokome_get_experience_company();
						$location = kofimokome_get_experience_location();
						$dates    = kofimokome_get_experience_dates();
						$items    = kofimokome_get_experience_items();
						?>
						<article class="km-timeline__item km-reveal">
							<div class="km-timeline__dot" aria-hidden="true"></div>
							<div class="km-timeline__header">
								<div>
									<h2 class="km-timeline__title"><?php the_title(); ?></h2>
									<div class="km-timeline__company"><?php echo esc_html( $company ); ?> · <?php echo esc_html( $location ); ?></div>
								</div>
								<span class="km-timeline__dates"><?php echo esc_html( $dates ); ?></span>
							</div>
							<?php if ( $items ) : ?>
								<ul class="km-timeline__list">
									<?php foreach ( $items as $item ) : ?>
										<li><?php echo esc_html( $item ); ?></li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</article>
					<?php endwhile; ?>
				</div>
			<?php else : ?>
				<p><?php esc_html_e( 'No experience entries yet.', 'kofimokome' ); ?></p>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</section>
</main>

<?php
get_footer();
