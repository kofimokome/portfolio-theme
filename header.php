<?php
/**
 * The header for the Kofi Mokome child theme.
 *
 * @package KofiMokome
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="km-header">
	<div class="km-header__inner">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="km-logo" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
			<img src="<?php echo esc_url( KOFIMOKOME_URI . '/assets/img/kofimokome-logo.png' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="km-logo__img">
		</a>

		<nav class="km-nav" id="km-nav" aria-label="<?php esc_attr_e( 'Primary', 'kofimokome' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => 'km-nav__links',
					'fallback_cb'    => function() {
						echo '<ul class="km-nav__links">
							<li><a href="' . esc_url( home_url( '/about/' ) ) . '">About</a></li>
							<li><a href="' . esc_url( home_url( '/experience/' ) ) . '">Experience</a></li>
						<li><a href="' . esc_url( home_url( '/open-source/' ) ) . '">Open Source</a></li>
						<li><a href="' . esc_url( home_url( '/projects/' ) ) . '">Projects</a></li>
						<li><a href="' . esc_url( home_url( '/speaking/' ) ) . '">Speaking</a></li>
							<li><a href="' . esc_url( home_url( '/awards/' ) ) . '">Awards</a></li>
							<li><a href="' . esc_url( home_url( '/#contact' ) ) . '">Contact</a></li>
						</ul>';
					},
				)
			);
			?>
			<a href="#contact" class="km-btn km-btn--primary">Let's talk</a>
		</nav>

		<button class="km-menu-toggle" id="km-menu-toggle" aria-controls="km-nav" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle menu', 'kofimokome' ); ?>">
			<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
				<line x1="3" y1="6" x2="21" y2="6"></line>
				<line x1="3" y1="12" x2="21" y2="12"></line>
				<line x1="3" y1="18" x2="21" y2="18"></line>
			</svg>
		</button>
	</div>
</header>

<main id="km-main" class="km-main">
