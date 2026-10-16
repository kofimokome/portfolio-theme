<?php
/**
 * Kofi Mokome child theme functions.
 *
 * @package KofiMokome
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

	if ( ! defined( 'KOFIMOKOME_VERSION' ) ) {
		define( 'KOFIMOKOME_VERSION', '1.6.0' );
	}

if ( ! defined( 'KOFIMOKOME_URI' ) ) {
	define( 'KOFIMOKOME_URI', get_stylesheet_directory_uri() );
}

if ( ! defined( 'KOFIMOKOME_PATH' ) ) {
	define( 'KOFIMOKOME_PATH', get_stylesheet_directory() );
}

/**
 * Set up theme support and menus.
 */
function kofimokome_setup() {
	// Register a primary nav for the custom header.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary Menu', 'kofimokome' ),
			'footer'  => esc_html__( 'Footer Menu', 'kofimokome' ),
		)
	);

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	add_theme_support( 'custom-logo', array( 'height' => 80, 'width' => 320, 'flex-height' => true, 'flex-width' => true ) );
}
add_action( 'after_setup_theme', 'kofimokome_setup', 20 );

/**
 * Enqueue styles and scripts.
 */
function kofimokome_assets() {
	// Parent Hello Elementor stylesheet.
	wp_enqueue_style(
		'hello-elementor-style',
		get_template_directory_uri() . '/style.css',
		array(),
		kofimokome_get_parent_version()
	);

	// Google Fonts: Space Grotesk for headings, Inter for body text.
	wp_enqueue_style(
		'kofimokome-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	// Font Awesome brand + solid icons.
	wp_enqueue_style(
		'font-awesome-base',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/fontawesome.min.css',
		array(),
		'6.5.2'
	);
	wp_enqueue_style(
		'font-awesome-solid',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/solid.min.css',
		array('font-awesome-base'),
		'6.5.2'
	);
	wp_enqueue_style(
		'font-awesome-brands',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/brands.min.css',
		array('font-awesome-base'),
		'6.5.2'
	);

	// Child theme main stylesheet.
	wp_enqueue_style(
		'kofimokome-main',
		KOFIMOKOME_URI . '/assets/css/main.css',
		array( 'hello-elementor-style', 'kofimokome-fonts' ),
		KOFIMOKOME_VERSION
	);

	// Child theme scripts.
	wp_enqueue_script(
		'kofimokome-main',
		KOFIMOKOME_URI . '/assets/js/main.js',
		array(),
		KOFIMOKOME_VERSION,
		true
	);
}
add_action( 'wp_enqueue_scripts', 'kofimokome_assets', 20 );

/**
 * Helper: safely get Hello Elementor version.
 */
function kofimokome_get_parent_version() {
	if ( defined( 'HELLO_ELEMENTOR_VERSION' ) ) {
		return HELLO_ELEMENTOR_VERSION;
	}
	$theme = wp_get_theme( 'hello-elementor' );
	return $theme->exists() ? $theme->get( 'Version' ) : '1.0';
}

/**
 * Add custom body classes.
 *
 * @param array $classes Body classes.
 * @return array
 */
function kofimokome_body_classes( $classes ) {
	$classes[] = 'kofi-mokome-theme';
	if ( is_front_page() ) {
		$classes[] = 'kofi-front-page';
	}
	return $classes;
}
add_filter( 'body_class', 'kofimokome_body_classes' );

/**
 * Customizer settings.
 *
 * @param WP_Customize_Manager $wp_customize Customizer manager.
 */
function kofimokome_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'kofimokome_footer',
		array(
			'title'    => esc_html__( 'Footer', 'kofimokome' ),
			'priority' => 120,
		)
	);

	$wp_customize->add_setting(
		'kofimokome_footer_text',
		array(
			'default'           => esc_html__( 'Built with WordPress, Hello Elementor & a custom child theme.', 'kofimokome' ),
			'sanitize_callback' => 'wp_kses_post',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'kofimokome_footer_text',
		array(
			'label'   => esc_html__( 'Footer note', 'kofimokome' ),
			'section' => 'kofimokome_footer',
			'type'    => 'textarea',
		)
	);
}
add_action( 'customize_register', 'kofimokome_customize_register' );

/**
 * Register the Project custom post type.
 */
function kofimokome_register_project_cpt() {
	$labels = array(
		'name'                  => esc_html__( 'Projects', 'kofimokome' ),
		'singular_name'         => esc_html__( 'Project', 'kofimokome' ),
		'add_new'               => esc_html__( 'Add New', 'kofimokome' ),
		'add_new_item'          => esc_html__( 'Add New Project', 'kofimokome' ),
		'edit_item'             => esc_html__( 'Edit Project', 'kofimokome' ),
		'new_item'              => esc_html__( 'New Project', 'kofimokome' ),
		'view_item'             => esc_html__( 'View Project', 'kofimokome' ),
		'view_items'            => esc_html__( 'View Projects', 'kofimokome' ),
		'search_items'          => esc_html__( 'Search Projects', 'kofimokome' ),
		'not_found'             => esc_html__( 'No projects found.', 'kofimokome' ),
		'not_found_in_trash'    => esc_html__( 'No projects found in Trash.', 'kofimokome' ),
		'all_items'             => esc_html__( 'All Projects', 'kofimokome' ),
		'archives'              => esc_html__( 'Project Archives', 'kofimokome' ),
		'attributes'            => esc_html__( 'Project Attributes', 'kofimokome' ),
		'insert_into_item'      => esc_html__( 'Insert into project', 'kofimokome' ),
		'uploaded_to_this_item' => esc_html__( 'Uploaded to this project', 'kofimokome' ),
		'menu_name'             => esc_html__( 'Projects', 'kofimokome' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'project' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'menu_icon'          => 'dashicons-portfolio',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'custom-fields', 'revisions' ),
		'show_in_rest'       => true,
	);

	register_post_type( 'project', $args );
}
add_action( 'init', 'kofimokome_register_project_cpt', 0 );

/**
 * Register the Project Tag taxonomy.
 */
function kofimokome_register_project_tag_taxonomy() {
	$labels = array(
		'name'          => esc_html__( 'Project Tags', 'kofimokome' ),
		'singular_name' => esc_html__( 'Project Tag', 'kofimokome' ),
		'add_new_item'  => esc_html__( 'Add New Project Tag', 'kofimokome' ),
		'edit_item'     => esc_html__( 'Edit Project Tag', 'kofimokome' ),
		'all_items'     => esc_html__( 'All Project Tags', 'kofimokome' ),
	);

	$args = array(
		'labels'       => $labels,
		'public'       => true,
		'hierarchical' => false,
		'rewrite'      => array( 'slug' => 'project-tag' ),
		'show_in_rest' => true,
	);

	register_taxonomy( 'project_tag', array( 'project' ), $args );
}
add_action( 'init', 'kofimokome_register_project_tag_taxonomy', 0 );

/**
 * Helper: get project tagline.
 *
 * @param int $post_id Post ID.
 * @return string
 */
function kofimokome_get_project_tagline( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$tagline = get_post_meta( $post_id, '_km_project_tagline', true );
	if ( $tagline ) {
		return $tagline;
	}
	$excerpt = get_the_excerpt( $post_id );
	return $excerpt ? wp_trim_words( $excerpt, 8 ) : '';
}

/**
 * Helper: get project external URL.
 *
 * @param int $post_id Post ID.
 * @return string
 */
function kofimokome_get_project_url( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return get_post_meta( $post_id, '_km_project_url', true );
}

/**
 * Helper: get project tags.
 *
 * @param int $post_id Post ID.
 * @return array
 */
function kofimokome_get_project_tags( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$terms   = get_the_terms( $post_id, 'project_tag' );
	if ( ! $terms || is_wp_error( $terms ) ) {
		return array();
	}
	return wp_list_pluck( $terms, 'name' );
}

/**
 * Helper: get project image URL.
 *
 * @param int $post_id Post ID.
 * @return string
 */
function kofimokome_get_project_image( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$thumb   = get_the_post_thumbnail_url( $post_id, 'large' );
	return $thumb ? $thumb : KOFIMOKOME_URI . '/assets/img/placeholder.svg';
}

/**
 * Helper: check if a project is featured.
 *
 * @param int $post_id Post ID.
 * @return bool
 */
function kofimokome_is_project_featured( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return (bool) get_post_meta( $post_id, '_km_project_featured', true );
}

/**
 * Add a meta box for project options.
 */
function kofimokome_add_project_meta_box() {
	add_meta_box(
		'kofimokome_project_options',
		esc_html__( 'Project Options', 'kofimokome' ),
		'kofimokome_render_project_meta_box',
		'project',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'kofimokome_add_project_meta_box' );

/**
 * Render project options meta box.
 *
 * @param WP_Post $post Post object.
 */
function kofimokome_render_project_meta_box( $post ) {
	wp_nonce_field( 'kofimokome_project_meta', 'kofimokome_project_meta_nonce' );
	$featured = kofimokome_is_project_featured( $post->ID );
	$tagline  = get_post_meta( $post->ID, '_km_project_tagline', true );
	$url      = get_post_meta( $post->ID, '_km_project_url', true );
	?>
	<p>
		<label for="km_project_tagline"><?php esc_html_e( 'Tagline', 'kofimokome' ); ?></label>
		<input type="text" id="km_project_tagline" name="km_project_tagline" value="<?php echo esc_attr( $tagline ); ?>" class="widefat">
	</p>
	<p>
		<label for="km_project_url"><?php esc_html_e( 'Project URL', 'kofimokome' ); ?></label>
		<input type="url" id="km_project_url" name="km_project_url" value="<?php echo esc_attr( $url ); ?>" class="widefat" placeholder="https://">
	</p>
	<p>
		<label>
			<input type="checkbox" name="km_project_featured" value="1" <?php checked( $featured, true ); ?>>
			<?php esc_html_e( 'Featured project (shown on Open Source page)', 'kofimokome' ); ?>
		</label>
	</p>
	<?php
}

/**
 * Save project meta box data.
 *
 * @param int $post_id Post ID.
 */
function kofimokome_save_project_meta_box( $post_id ) {
	if ( ! isset( $_POST['kofimokome_project_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['kofimokome_project_meta_nonce'] ) ), 'kofimokome_project_meta' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	if ( isset( $_POST['km_project_tagline'] ) ) {
		update_post_meta( $post_id, '_km_project_tagline', sanitize_text_field( wp_unslash( $_POST['km_project_tagline'] ) ) );
	}

	if ( isset( $_POST['km_project_url'] ) ) {
		update_post_meta( $post_id, '_km_project_url', esc_url_raw( wp_unslash( $_POST['km_project_url'] ) ) );
	}

	$featured = isset( $_POST['km_project_featured'] ) ? 1 : 0;
	update_post_meta( $post_id, '_km_project_featured', $featured );
}
add_action( 'save_post', 'kofimokome_save_project_meta_box' );

/**
 * Register the Experience custom post type.
 */
function kofimokome_register_experience_cpt() {
	$labels = array(
		'name'                  => esc_html__( 'Experience', 'kofimokome' ),
		'singular_name'         => esc_html__( 'Experience', 'kofimokome' ),
		'add_new'               => esc_html__( 'Add New', 'kofimokome' ),
		'add_new_item'          => esc_html__( 'Add New Experience', 'kofimokome' ),
		'edit_item'             => esc_html__( 'Edit Experience', 'kofimokome' ),
		'new_item'              => esc_html__( 'New Experience', 'kofimokome' ),
		'view_item'             => esc_html__( 'View Experience', 'kofimokome' ),
		'view_items'            => esc_html__( 'View Experience', 'kofimokome' ),
		'search_items'          => esc_html__( 'Search Experience', 'kofimokome' ),
		'not_found'             => esc_html__( 'No experience found.', 'kofimokome' ),
		'not_found_in_trash'    => esc_html__( 'No experience found in Trash.', 'kofimokome' ),
		'all_items'             => esc_html__( 'All Experience', 'kofimokome' ),
		'menu_name'             => esc_html__( 'Experience', 'kofimokome' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'career' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'menu_icon'          => 'dashicons-businessperson',
		'supports'           => array( 'title', 'thumbnail', 'page-attributes', 'custom-fields', 'revisions' ),
		'show_in_rest'       => true,
	);

	register_post_type( 'experience', $args );
}
add_action( 'init', 'kofimokome_register_experience_cpt', 0 );

/**
 * Helper: get experience company.
 *
 * @param int $post_id Post ID.
 * @return string
 */
function kofimokome_get_experience_company( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return get_post_meta( $post_id, '_km_experience_company', true );
}

/**
 * Helper: get experience location.
 *
 * @param int $post_id Post ID.
 * @return string
 */
function kofimokome_get_experience_location( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return get_post_meta( $post_id, '_km_experience_location', true );
}

/**
 * Helper: get experience dates.
 *
 * @param int $post_id Post ID.
 * @return string
 */
function kofimokome_get_experience_dates( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return get_post_meta( $post_id, '_km_experience_dates', true );
}

/**
 * Helper: get experience responsibility items.
 *
 * @param int $post_id Post ID.
 * @return array
 */
function kofimokome_get_experience_items( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$raw     = get_post_meta( $post_id, '_km_experience_items', true );
	$lines   = preg_split( '/\r\n|\r|\n/', $raw );
	$items   = array();
	foreach ( $lines as $line ) {
		$line = trim( $line );
		if ( '' !== $line ) {
			$items[] = $line;
		}
	}
	return $items;
}

/**
 * Helper: get experience tags.
 *
 * @param int $post_id Post ID.
 * @return array
 */
function kofimokome_get_experience_tags( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$raw     = get_post_meta( $post_id, '_km_experience_tags', true );
	$tags    = array();
	foreach ( explode( ',', $raw ) as $tag ) {
		$tag = trim( $tag );
		if ( '' !== $tag ) {
			$tags[] = $tag;
		}
	}
	return $tags;
}

/**
 * Helper: check if an experience is featured.
 *
 * @param int $post_id Post ID.
 * @return bool
 */
function kofimokome_is_experience_featured( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return (bool) get_post_meta( $post_id, '_km_experience_featured', true );
}

/**
 * Add a meta box for experience options.
 */
function kofimokome_add_experience_meta_box() {
	add_meta_box(
		'kofimokome_experience_options',
		esc_html__( 'Experience Details', 'kofimokome' ),
		'kofimokome_render_experience_meta_box',
		'experience',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'kofimokome_add_experience_meta_box' );

/**
 * Render experience options meta box.
 *
 * @param WP_Post $post Post object.
 */
function kofimokome_render_experience_meta_box( $post ) {
	wp_nonce_field( 'kofimokome_experience_meta', 'kofimokome_experience_meta_nonce' );
	$company   = kofimokome_get_experience_company( $post->ID );
	$location  = kofimokome_get_experience_location( $post->ID );
	$dates     = kofimokome_get_experience_dates( $post->ID );
	$items    = get_post_meta( $post->ID, '_km_experience_items', true );
	$tags     = get_post_meta( $post->ID, '_km_experience_tags', true );
	$featured = kofimokome_is_experience_featured( $post->ID );
	?>
	<p>
		<label>
			<input type="checkbox" name="km_experience_featured" value="1" <?php checked( $featured, true ); ?>>
			<?php esc_html_e( 'Featured experience (shown on homepage)', 'kofimokome' ); ?>
		</label>
	</p>
	<p>
		<label for="km_experience_company"><strong><?php esc_html_e( 'Company / Organization', 'kofimokome' ); ?></strong></label>
		<input type="text" id="km_experience_company" name="km_experience_company" value="<?php echo esc_attr( $company ); ?>" class="widefat">
	</p>
	<p>
		<label for="km_experience_location"><strong><?php esc_html_e( 'Location', 'kofimokome' ); ?></strong></label>
		<input type="text" id="km_experience_location" name="km_experience_location" value="<?php echo esc_attr( $location ); ?>" class="widefat">
	</p>
	<p>
		<label for="km_experience_dates"><strong><?php esc_html_e( 'Dates', 'kofimokome' ); ?></strong></label>
		<input type="text" id="km_experience_dates" name="km_experience_dates" value="<?php echo esc_attr( $dates ); ?>" class="widefat" placeholder="Jan 2020 – Present">
	</p>
	<p>
		<label for="km_experience_tags"><strong><?php esc_html_e( 'Tags', 'kofimokome' ); ?></strong></label>
		<input type="text" id="km_experience_tags" name="km_experience_tags" value="<?php echo esc_attr( $tags ); ?>" class="widefat" placeholder="Laravel, Docker, CI/CD, AI">
	</p>
	<p>
		<label for="km_experience_items"><strong><?php esc_html_e( 'Responsibilities', 'kofimokome' ); ?></strong></label>
		<textarea id="km_experience_items" name="km_experience_items" class="widefat" rows="10" placeholder="Enter one responsibility per line"><?php echo esc_textarea( $items ); ?></textarea>
	</p>
	<?php
}

/**
 * Save experience meta box data.
 *
 * @param int $post_id Post ID.
 */
function kofimokome_save_experience_meta_box( $post_id ) {
	if ( ! isset( $_POST['kofimokome_experience_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['kofimokome_experience_meta_nonce'] ) ), 'kofimokome_experience_meta' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array( 'km_experience_company', 'km_experience_location', 'km_experience_dates' );
	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_km_' . $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
		}
	}

	if ( isset( $_POST['km_experience_items'] ) ) {
		update_post_meta( $post_id, '_km_experience_items', sanitize_textarea_field( wp_unslash( $_POST['km_experience_items'] ) ) );
	}

	if ( isset( $_POST['km_experience_tags'] ) ) {
		update_post_meta( $post_id, '_km_experience_tags', sanitize_text_field( wp_unslash( $_POST['km_experience_tags'] ) ) );
	}

	$featured = isset( $_POST['km_experience_featured'] ) ? 1 : 0;
	update_post_meta( $post_id, '_km_experience_featured', $featured );
}
add_action( 'save_post', 'kofimokome_save_experience_meta_box' );

/**
 * Register the Community custom post type.
 */
function kofimokome_register_community_cpt() {
	$labels = array(
		'name'                  => esc_html__( 'Community', 'kofimokome' ),
		'singular_name'         => esc_html__( 'Community', 'kofimokome' ),
		'add_new'               => esc_html__( 'Add New', 'kofimokome' ),
		'add_new_item'          => esc_html__( 'Add New Community', 'kofimokome' ),
		'edit_item'             => esc_html__( 'Edit Community', 'kofimokome' ),
		'new_item'              => esc_html__( 'New Community', 'kofimokome' ),
		'view_item'             => esc_html__( 'View Community', 'kofimokome' ),
		'view_items'            => esc_html__( 'View Community', 'kofimokome' ),
		'search_items'          => esc_html__( 'Search Community', 'kofimokome' ),
		'not_found'             => esc_html__( 'No community items found.', 'kofimokome' ),
		'not_found_in_trash'    => esc_html__( 'No community items found in Trash.', 'kofimokome' ),
		'all_items'             => esc_html__( 'All Community', 'kofimokome' ),
		'menu_name'             => esc_html__( 'Community', 'kofimokome' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'community' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 7,
		'menu_icon'          => 'dashicons-groups',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields', 'revisions' ),
		'show_in_rest'       => true,
	);

	register_post_type( 'community', $args );
}
add_action( 'init', 'kofimokome_register_community_cpt', 0 );

/**
 * Helper: get community icon class.
 *
 * @param int $post_id Post ID.
 * @return string
 */
function kofimokome_get_community_icon( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$icon    = get_post_meta( $post_id, '_km_community_icon', true );
	return $icon ? $icon : 'fa-handshake';
}

/**
 * Helper: get community location.
 *
 * @param int $post_id Post ID.
 * @return string
 */
function kofimokome_get_community_location( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return get_post_meta( $post_id, '_km_community_location', true );
}

/**
 * Helper: get community dates.
 *
 * @param int $post_id Post ID.
 * @return string
 */
function kofimokome_get_community_dates( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return get_post_meta( $post_id, '_km_community_dates', true );
}

/**
 * Helper: get community role / meta label.
 *
 * @param int $post_id Post ID.
 * @return string
 */
function kofimokome_get_community_role( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return get_post_meta( $post_id, '_km_community_role', true );
}

/**
 * Helper: get community link URL.
 *
 * @param int $post_id Post ID.
 * @return string
 */
function kofimokome_get_community_link( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return get_post_meta( $post_id, '_km_community_link', true );
}

/**
 * Helper: check if a community item is featured.
 *
 * @param int $post_id Post ID.
 * @return bool
 */
function kofimokome_is_community_featured( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return (bool) get_post_meta( $post_id, '_km_community_featured', true );
}

/**
 * Add a meta box for community options.
 */
function kofimokome_add_community_meta_box() {
	add_meta_box(
		'kofimokome_community_options',
		esc_html__( 'Community Details', 'kofimokome' ),
		'kofimokome_render_community_meta_box',
		'community',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'kofimokome_add_community_meta_box' );

/**
 * Render community options meta box.
 *
 * @param WP_Post $post Post object.
 */
function kofimokome_render_community_meta_box( $post ) {
	wp_nonce_field( 'kofimokome_community_meta', 'kofimokome_community_meta_nonce' );
	$icon     = kofimokome_get_community_icon( $post->ID );
	$location = kofimokome_get_community_location( $post->ID );
	$dates    = kofimokome_get_community_dates( $post->ID );
	$role     = kofimokome_get_community_role( $post->ID );
	$link     = kofimokome_get_community_link( $post->ID );
	$featured = kofimokome_is_community_featured( $post->ID );
	?>
	<p>
		<label>
			<input type="checkbox" name="km_community_featured" value="1" <?php checked( $featured, true ); ?>>
			<?php esc_html_e( 'Featured community item (shown on homepage)', 'kofimokome' ); ?>
		</label>
	</p>
	<p>
		<label for="km_community_icon"><strong><?php esc_html_e( 'Icon Class', 'kofimokome' ); ?></strong></label>
		<input type="text" id="km_community_icon" name="km_community_icon" value="<?php echo esc_attr( $icon ); ?>" class="widefat" placeholder="fa-users">
	</p>
	<p>
		<label for="km_community_location"><strong><?php esc_html_e( 'Location', 'kofimokome' ); ?></strong></label>
		<input type="text" id="km_community_location" name="km_community_location" value="<?php echo esc_attr( $location ); ?>" class="widefat" placeholder="Buea or Global (remote)">
	</p>
	<p>
		<label for="km_community_dates"><strong><?php esc_html_e( 'Dates', 'kofimokome' ); ?></strong></label>
		<input type="text" id="km_community_dates" name="km_community_dates" value="<?php echo esc_attr( $dates ); ?>" class="widefat" placeholder="Jun 2023 – Present">
	</p>
	<p>
		<label for="km_community_role"><strong><?php esc_html_e( 'Role / Meta Label', 'kofimokome' ); ?></strong></label>
		<input type="text" id="km_community_role" name="km_community_role" value="<?php echo esc_attr( $role ); ?>" class="widefat" placeholder="Core contributor">
	</p>
	<p>
		<label for="km_community_link"><strong><?php esc_html_e( 'Link URL', 'kofimokome' ); ?></strong></label>
		<input type="url" id="km_community_link" name="km_community_link" value="<?php echo esc_attr( $link ); ?>" class="widefat" placeholder="https://">
	</p>
	<?php
}

/**
 * Save community meta box data.
 *
 * @param int $post_id Post ID.
 */
function kofimokome_save_community_meta_box( $post_id ) {
	if ( ! isset( $_POST['kofimokome_community_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['kofimokome_community_meta_nonce'] ) ), 'kofimokome_community_meta' ) ) {
		return;
	}

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$fields = array( 'km_community_icon', 'km_community_location', 'km_community_dates', 'km_community_role' );
	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_km_' . $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
		}
	}

	if ( isset( $_POST['km_community_link'] ) ) {
		update_post_meta( $post_id, '_km_community_link', esc_url_raw( wp_unslash( $_POST['km_community_link'] ) ) );
	}

	$featured = isset( $_POST['km_community_featured'] ) ? 1 : 0;
	update_post_meta( $post_id, '_km_community_featured', $featured );
}
add_action( 'save_post', 'kofimokome_save_community_meta_box' );

/**
 * Register the Education custom post type.
 */
function kofimokome_register_education_cpt() {
	$labels = array(
		'name'          => esc_html__( 'Education', 'kofimokome' ),
		'singular_name' => esc_html__( 'Education', 'kofimokome' ),
		'add_new'       => esc_html__( 'Add New', 'kofimokome' ),
		'add_new_item'  => esc_html__( 'Add New Education', 'kofimokome' ),
		'edit_item'     => esc_html__( 'Edit Education', 'kofimokome' ),
		'new_item'      => esc_html__( 'New Education', 'kofimokome' ),
		'view_item'     => esc_html__( 'View Education', 'kofimokome' ),
		'view_items'    => esc_html__( 'View Education', 'kofimokome' ),
		'search_items'  => esc_html__( 'Search Education', 'kofimokome' ),
		'not_found'     => esc_html__( 'No education found.', 'kofimokome' ),
		'all_items'     => esc_html__( 'All Education', 'kofimokome' ),
		'menu_name'     => esc_html__( 'Education', 'kofimokome' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'education' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 8,
		'menu_icon'          => 'dashicons-welcome-learn-more',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields', 'revisions' ),
		'show_in_rest'       => true,
	);

	register_post_type( 'education', $args );
}
add_action( 'init', 'kofimokome_register_education_cpt', 0 );

function kofimokome_get_education_abbr( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return get_post_meta( $post_id, '_km_education_abbr', true );
}
function kofimokome_get_education_school( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return get_post_meta( $post_id, '_km_education_school', true );
}
function kofimokome_get_education_dates( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return get_post_meta( $post_id, '_km_education_dates', true );
}
function kofimokome_get_education_thesis( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return get_post_meta( $post_id, '_km_education_thesis', true );
}
function kofimokome_get_education_tags( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$raw     = get_post_meta( $post_id, '_km_education_tags', true );
	$tags    = array();
	foreach ( explode( ',', $raw ) as $tag ) {
		$tag = trim( $tag );
		if ( '' !== $tag ) {
			$tags[] = $tag;
		}
	}
	return $tags;
}
function kofimokome_is_education_featured( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return (bool) get_post_meta( $post_id, '_km_education_featured', true );
}

function kofimokome_add_education_meta_box() {
	add_meta_box(
		'kofimokome_education_options',
		esc_html__( 'Education Details', 'kofimokome' ),
		'kofimokome_render_education_meta_box',
		'education',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'kofimokome_add_education_meta_box' );

function kofimokome_render_education_meta_box( $post ) {
	wp_nonce_field( 'kofimokome_education_meta', 'kofimokome_education_meta_nonce' );
	$abbr     = kofimokome_get_education_abbr( $post->ID );
	$school   = kofimokome_get_education_school( $post->ID );
	$dates    = kofimokome_get_education_dates( $post->ID );
	$thesis   = kofimokome_get_education_thesis( $post->ID );
	$tags     = get_post_meta( $post->ID, '_km_education_tags', true );
	$featured = kofimokome_is_education_featured( $post->ID );
	?>
	<p>
		<label>
			<input type="checkbox" name="km_education_featured" value="1" <?php checked( $featured, true ); ?>>
			<?php esc_html_e( 'Featured education (shown on homepage)', 'kofimokome' ); ?>
		</label>
	</p>
	<p>
		<label for="km_education_abbr"><strong><?php esc_html_e( 'Abbreviation', 'kofimokome' ); ?></strong></label>
		<input type="text" id="km_education_abbr" name="km_education_abbr" value="<?php echo esc_attr( $abbr ); ?>" class="widefat" placeholder="MTech">
	</p>
	<p>
		<label for="km_education_school"><strong><?php esc_html_e( 'School / University', 'kofimokome' ); ?></strong></label>
		<input type="text" id="km_education_school" name="km_education_school" value="<?php echo esc_attr( $school ); ?>" class="widefat">
	</p>
	<p>
		<label for="km_education_dates"><strong><?php esc_html_e( 'Dates', 'kofimokome' ); ?></strong></label>
		<input type="text" id="km_education_dates" name="km_education_dates" value="<?php echo esc_attr( $dates ); ?>" class="widefat" placeholder="2020 – 2023">
	</p>
	<p>
		<label for="km_education_thesis"><strong><?php esc_html_e( 'Thesis / Focus', 'kofimokome' ); ?></strong></label>
		<input type="text" id="km_education_thesis" name="km_education_thesis" value="<?php echo esc_attr( $thesis ); ?>" class="widefat">
	</p>
	<p>
		<label for="km_education_tags"><strong><?php esc_html_e( 'Tags', 'kofimokome' ); ?></strong></label>
		<input type="text" id="km_education_tags" name="km_education_tags" value="<?php echo esc_attr( $tags ); ?>" class="widefat" placeholder="AI, Computer Vision, Research">
	</p>
	<?php
}

function kofimokome_save_education_meta_box( $post_id ) {
	if ( ! isset( $_POST['kofimokome_education_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['kofimokome_education_meta_nonce'] ) ), 'kofimokome_education_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	$fields = array( 'km_education_abbr', 'km_education_school', 'km_education_dates', 'km_education_thesis', 'km_education_tags' );
	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_km_' . $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
		}
	}
	$featured = isset( $_POST['km_education_featured'] ) ? 1 : 0;
	update_post_meta( $post_id, '_km_education_featured', $featured );
}
add_action( 'save_post', 'kofimokome_save_education_meta_box' );

/**
 * Register the Award custom post type.
 */
function kofimokome_register_award_cpt() {
	$labels = array(
		'name'          => esc_html__( 'Awards', 'kofimokome' ),
		'singular_name' => esc_html__( 'Award', 'kofimokome' ),
		'add_new'       => esc_html__( 'Add New', 'kofimokome' ),
		'add_new_item'  => esc_html__( 'Add New Award', 'kofimokome' ),
		'edit_item'     => esc_html__( 'Edit Award', 'kofimokome' ),
		'new_item'      => esc_html__( 'New Award', 'kofimokome' ),
		'view_item'     => esc_html__( 'View Award', 'kofimokome' ),
		'view_items'    => esc_html__( 'View Awards', 'kofimokome' ),
		'search_items'  => esc_html__( 'Search Awards', 'kofimokome' ),
		'not_found'     => esc_html__( 'No awards found.', 'kofimokome' ),
		'all_items'     => esc_html__( 'All Awards', 'kofimokome' ),
		'menu_name'     => esc_html__( 'Awards', 'kofimokome' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'award' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 9,
		'menu_icon'          => 'dashicons-awards',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields', 'revisions' ),
		'show_in_rest'       => true,
	);

	register_post_type( 'award', $args );
}
add_action( 'init', 'kofimokome_register_award_cpt', 0 );

function kofimokome_get_award_year( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return get_post_meta( $post_id, '_km_award_year', true );
}
function kofimokome_get_award_organization( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return get_post_meta( $post_id, '_km_award_organization', true );
}
function kofimokome_get_award_icon( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$icon    = get_post_meta( $post_id, '_km_award_icon', true );
	return $icon ? $icon : 'fa-award';
}
function kofimokome_is_award_featured( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return (bool) get_post_meta( $post_id, '_km_award_featured', true );
}

function kofimokome_add_award_meta_box() {
	add_meta_box(
		'kofimokome_award_options',
		esc_html__( 'Award Details', 'kofimokome' ),
		'kofimokome_render_award_meta_box',
		'award',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'kofimokome_add_award_meta_box' );

function kofimokome_render_award_meta_box( $post ) {
	wp_nonce_field( 'kofimokome_award_meta', 'kofimokome_award_meta_nonce' );
	$year     = kofimokome_get_award_year( $post->ID );
	$org      = kofimokome_get_award_organization( $post->ID );
	$icon     = kofimokome_get_award_icon( $post->ID );
	$featured = kofimokome_is_award_featured( $post->ID );
	?>
	<p>
		<label>
			<input type="checkbox" name="km_award_featured" value="1" <?php checked( $featured, true ); ?>>
			<?php esc_html_e( 'Featured award (shown on homepage)', 'kofimokome' ); ?>
		</label>
	</p>
	<p>
		<label for="km_award_year"><strong><?php esc_html_e( 'Year', 'kofimokome' ); ?></strong></label>
		<input type="text" id="km_award_year" name="km_award_year" value="<?php echo esc_attr( $year ); ?>" class="widefat" placeholder="2026">
	</p>
	<p>
		<label for="km_award_organization"><strong><?php esc_html_e( 'Organization', 'kofimokome' ); ?></strong></label>
		<input type="text" id="km_award_organization" name="km_award_organization" value="<?php echo esc_attr( $org ); ?>" class="widefat" placeholder="Yoast">
	</p>
	<p>
		<label for="km_award_icon"><strong><?php esc_html_e( 'Icon Class', 'kofimokome' ); ?></strong></label>
		<input type="text" id="km_award_icon" name="km_award_icon" value="<?php echo esc_attr( $icon ); ?>" class="widefat" placeholder="fa-award">
	</p>
	<?php
}

function kofimokome_save_award_meta_box( $post_id ) {
	if ( ! isset( $_POST['kofimokome_award_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['kofimokome_award_meta_nonce'] ) ), 'kofimokome_award_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	$fields = array( 'km_award_year', 'km_award_organization', 'km_award_icon' );
	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_km_' . $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
		}
	}
	$featured = isset( $_POST['km_award_featured'] ) ? 1 : 0;
	update_post_meta( $post_id, '_km_award_featured', $featured );
}
add_action( 'save_post', 'kofimokome_save_award_meta_box' );

/**
 * Register the Speaking custom post type.
 */
function kofimokome_register_speaking_cpt() {
	$labels = array(
		'name'          => esc_html__( 'Speaking', 'kofimokome' ),
		'singular_name' => esc_html__( 'Talk', 'kofimokome' ),
		'add_new'       => esc_html__( 'Add New', 'kofimokome' ),
		'add_new_item'  => esc_html__( 'Add New Talk', 'kofimokome' ),
		'edit_item'     => esc_html__( 'Edit Talk', 'kofimokome' ),
		'new_item'      => esc_html__( 'New Talk', 'kofimokome' ),
		'view_item'     => esc_html__( 'View Talk', 'kofimokome' ),
		'view_items'    => esc_html__( 'View Talks', 'kofimokome' ),
		'search_items'  => esc_html__( 'Search Talks', 'kofimokome' ),
		'not_found'     => esc_html__( 'No talks found.', 'kofimokome' ),
		'all_items'     => esc_html__( 'All Talks', 'kofimokome' ),
		'menu_name'     => esc_html__( 'Speaking', 'kofimokome' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'talk' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 10,
		'menu_icon'          => 'dashicons-microphone',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields', 'revisions' ),
		'show_in_rest'       => true,
	);

	register_post_type( 'speaking', $args );
}
add_action( 'init', 'kofimokome_register_speaking_cpt', 0 );

function kofimokome_get_speaking_location( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return get_post_meta( $post_id, '_km_speaking_location', true );
}
function kofimokome_get_speaking_date( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return get_post_meta( $post_id, '_km_speaking_date', true );
}
function kofimokome_get_speaking_year( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return get_post_meta( $post_id, '_km_speaking_year', true );
}
function kofimokome_is_speaking_featured( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	return (bool) get_post_meta( $post_id, '_km_speaking_featured', true );
}

function kofimokome_add_speaking_meta_box() {
	add_meta_box(
		'kofimokome_speaking_options',
		esc_html__( 'Talk Details', 'kofimokome' ),
		'kofimokome_render_speaking_meta_box',
		'speaking',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'kofimokome_add_speaking_meta_box' );

function kofimokome_render_speaking_meta_box( $post ) {
	wp_nonce_field( 'kofimokome_speaking_meta', 'kofimokome_speaking_meta_nonce' );
	$location = kofimokome_get_speaking_location( $post->ID );
	$date     = kofimokome_get_speaking_date( $post->ID );
	$year     = kofimokome_get_speaking_year( $post->ID );
	$featured = kofimokome_is_speaking_featured( $post->ID );
	?>
	<p>
		<label>
			<input type="checkbox" name="km_speaking_featured" value="1" <?php checked( $featured, true ); ?>>
			<?php esc_html_e( 'Featured talk (shown on homepage)', 'kofimokome' ); ?>
		</label>
	</p>
	<p>
		<label for="km_speaking_location"><strong><?php esc_html_e( 'Location', 'kofimokome' ); ?></strong></label>
		<input type="text" id="km_speaking_location" name="km_speaking_location" value="<?php echo esc_attr( $location ); ?>" class="widefat" placeholder="South Africa">
	</p>
	<p>
		<label for="km_speaking_date"><strong><?php esc_html_e( 'Date', 'kofimokome' ); ?></strong></label>
		<input type="text" id="km_speaking_date" name="km_speaking_date" value="<?php echo esc_attr( $date ); ?>" class="widefat" placeholder="October 2026">
	</p>
	<p>
		<label for="km_speaking_year"><strong><?php esc_html_e( 'Year (for homepage)', 'kofimokome' ); ?></strong></label>
		<input type="text" id="km_speaking_year" name="km_speaking_year" value="<?php echo esc_attr( $year ); ?>" class="widefat" placeholder="2026">
	</p>
	<?php
}

function kofimokome_save_speaking_meta_box( $post_id ) {
	if ( ! isset( $_POST['kofimokome_speaking_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['kofimokome_speaking_meta_nonce'] ) ), 'kofimokome_speaking_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	$fields = array( 'km_speaking_location', 'km_speaking_date', 'km_speaking_year' );
	foreach ( $fields as $field ) {
		if ( isset( $_POST[ $field ] ) ) {
			update_post_meta( $post_id, '_km_' . $field, sanitize_text_field( wp_unslash( $_POST[ $field ] ) ) );
		}
	}
	$featured = isset( $_POST['km_speaking_featured'] ) ? 1 : 0;
	update_post_meta( $post_id, '_km_speaking_featured', $featured );
}
add_action( 'save_post', 'kofimokome_save_speaking_meta_box' );

/**
 * Register the Hero Badge custom post type.
 */
function kofimokome_register_hero_badge_cpt() {
	$labels = array(
		'name'          => esc_html__( 'Hero Badges', 'kofimokome' ),
		'singular_name' => esc_html__( 'Hero Badge', 'kofimokome' ),
		'add_new'       => esc_html__( 'Add New', 'kofimokome' ),
		'add_new_item'  => esc_html__( 'Add New Hero Badge', 'kofimokome' ),
		'edit_item'     => esc_html__( 'Edit Hero Badge', 'kofimokome' ),
		'new_item'      => esc_html__( 'New Hero Badge', 'kofimokome' ),
		'view_item'     => esc_html__( 'View Hero Badge', 'kofimokome' ),
		'view_items'    => esc_html__( 'View Hero Badges', 'kofimokome' ),
		'search_items'  => esc_html__( 'Search Hero Badges', 'kofimokome' ),
		'not_found'     => esc_html__( 'No hero badges found.', 'kofimokome' ),
		'all_items'     => esc_html__( 'All Hero Badges', 'kofimokome' ),
		'menu_name'     => esc_html__( 'Hero Badges', 'kofimokome' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'hero-badge' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 11,
		'menu_icon'          => 'dashicons-star-filled',
		'supports'           => array( 'title', 'page-attributes', 'custom-fields', 'revisions' ),
		'show_in_rest'       => true,
	);

	register_post_type( 'hero_badge', $args );
}
add_action( 'init', 'kofimokome_register_hero_badge_cpt', 0 );

function kofimokome_get_hero_badge_icon( $post_id = 0 ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$icon    = get_post_meta( $post_id, '_km_hero_badge_icon', true );
	return $icon ? $icon : 'fa-star';
}

function kofimokome_add_hero_badge_meta_box() {
	add_meta_box(
		'kofimokome_hero_badge_options',
		esc_html__( 'Badge Details', 'kofimokome' ),
		'kofimokome_render_hero_badge_meta_box',
		'hero_badge',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'kofimokome_add_hero_badge_meta_box' );

function kofimokome_render_hero_badge_meta_box( $post ) {
	wp_nonce_field( 'kofimokome_hero_badge_meta', 'kofimokome_hero_badge_meta_nonce' );
	$icon = kofimokome_get_hero_badge_icon( $post->ID );
	?>
	<p>
		<label for="km_hero_badge_icon"><strong><?php esc_html_e( 'Icon Class', 'kofimokome' ); ?></strong></label>
		<input type="text" id="km_hero_badge_icon" name="km_hero_badge_icon" value="<?php echo esc_attr( $icon ); ?>" class="widefat" placeholder="fab fa-laravel">
		<small><?php esc_html_e( 'Use a Font Awesome class, e.g. fab fa-laravel or fas fa-database.', 'kofimokome' ); ?></small>
	</p>
	<?php
}

function kofimokome_save_hero_badge_meta_box( $post_id ) {
	if ( ! isset( $_POST['kofimokome_hero_badge_meta_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['kofimokome_hero_badge_meta_nonce'] ) ), 'kofimokome_hero_badge_meta' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	if ( isset( $_POST['km_hero_badge_icon'] ) ) {
		update_post_meta( $post_id, '_km_hero_badge_icon', sanitize_text_field( wp_unslash( $_POST['km_hero_badge_icon'] ) ) );
	}
}
add_action( 'save_post', 'kofimokome_save_hero_badge_meta_box' );
