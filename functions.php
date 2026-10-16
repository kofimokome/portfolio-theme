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
		define( 'KOFIMOKOME_VERSION', '1.2.0' );
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
