<?php
/**
 * The functions file is used to initialize everything in the theme.  It controls how the theme is loaded and 
 * sets up the supported features, default actions, and default filters.  If making customizations, users 
 * should create a child theme and make changes to its functions.php file (not this one).  Friends don't let 
 * friends modify parent theme files. ;)
 *
 * Child themes should do their setup on the 'after_setup_theme' hook with a priority of 11 if they want to
 * override parent theme features.  Use a priority of 9 if wanting to run before the parent theme.
 *
 * @package Happy
 * @subpackage Functions
 * @version 0.1.0
 * @author Brian Krogsgard <Brian@Krogsgard.com>
 * @copyright Copyright (c) 2011, Brian Krogsgard
 * @link http://krogsgard.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Load the core theme framework. */

require_once( trailingslashit( TEMPLATEPATH ) . 'library/hybrid.php' );

$theme = new Hybrid();

/* Do theme setup on the 'after_setup_theme' hook. */

add_action( 'after_setup_theme', 'happy_theme_setup' );

/**
 * Theme setup function.  This function adds support for theme features and defines the default theme
 * actions and filters.
 *
 * @since 0.1.0
 */

function happy_theme_setup() {

	/* Get action/filter hook prefix. */
	
	$prefix = hybrid_get_prefix();

	/* Add theme support for core framework features. */
	
	add_theme_support( 'hybrid-core-menus', array( 'primary', 'secondary', 'subsidiary' ) );
	add_theme_support( 'hybrid-core-sidebars', array( 'primary', 'secondary', 'header', 'subsidiary', 'after-singular' ) );
	add_theme_support( 'hybrid-core-widgets' );
	add_theme_support( 'hybrid-core-shortcodes' );
	add_theme_support( 'hybrid-core-theme-settings', array( 'about', 'footer' ) );
	add_theme_support( 'hybrid-core-meta-box-footer' );
	add_theme_support( 'hybrid-core-template-hierarchy' );

	/* Add theme support for extensions. */

	add_theme_support( 'theme-layouts', array( '1c', '2c-l', '2c-r' ) );
	add_theme_support( 'dev-stylesheet' );
	add_theme_support( 'loop-pagination' );
	add_theme_support( 'get-the-image' );
	add_theme_support( 'entry-views' );
	add_theme_support( 'cleaner-gallery' );

	/* Add theme support for WordPress features. */
	
	/* Register support for some post formats */
	
	add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image', 'link', 'quote', 'video' ) );
	
	/* Wraps <blockquote> around quote posts. */
	add_filter( 'the_content', 'happy_quote_content' );
	
	/* Includes attached image if user doesn't include content on image post format */
	add_filter( 'the_content', 'happy_image_content' );
	
	/* Add infinity symbol for asides. Priority 9 to beat wpautop */
	add_filter( 'the_content', 'happy_aside_infinity', 9 ); 
	
	add_theme_support( 'automatic-feed-links' );
	
	/* Register sidebars. */
	
	add_action( 'widgets_init', 'happy_register_sidebars', 9 );
	

	/* Embed width/height defaults. */
	
	add_filter( 'embed_defaults', 'happy_embed_defaults' );

	/* Filter the sidebar widgets. */
	
	add_filter( 'sidebars_widgets', 'happy_disable_sidebars' );
	add_action( 'template_redirect', 'happy_one_column' );

	/* Change default comment status for pages to false. */	
	
	add_action( 'load-page-new.php', 'happy_change_comment_status' );
	
	/* load theme scripts and styles */
	
	add_action( 'wp_enqueue_scripts', 'happy_scripts' );
	
	/* change defaults for sidebar parameters */
	
	add_filter( "{$prefix}_sidebar_defaults", 'happy_change_sidebar_defaults' );	
	
	/* insert the header template part */
	
	add_action( "{$prefix}_before_main", 'happy_insert_header_template', 5 );
	
	/* insert the primaryy menu */
	
	add_action( "{$prefix}_before_header", 'happy_insert_primary_menu', 10 );
	
	/* insert the secondary menu */
	
	add_action( "{$prefix}_after_header", 'happy_insert_secondary_menu', 10 );

	/* insert the feature template part on the front page */
 
	add_action( "{$prefix}_home_before_main", 'happy_insert_feature_template', 10 );
	
	/* insert the custom header */
	
	add_action( "{$prefix}_feature", 'happy_insert_custom_header', 5 );	
	
	/* insert the feature sidebar */
	
	add_action( "{$prefix}_feature", 'happy_insert_feature_sidebar', 10 );	
	
	/* insert the primary sidebar */
	
	add_action( "{$prefix}_after_content", 'happy_insert_primary_sidebar', 5 );
	
	/* insert the secondary sidebar */
	
	add_action( "{$prefix}_after_content", 'happy_insert_secondary_sidebar', 10 );
	
	/* insert the after-singular sidebar */
	
	add_action( "{$prefix}_after_singular", 'happy_insert_after_singular_sidebar', 10 );
	
	/* insert the subsidiary sidebar */
	
	add_action( "{$prefix}_after_main", 'happy_insert_subsidiary_sidebar', 5 );	
	
	/* insert the subsidiary menu */
	
	add_action( "{$prefix}_after_main", 'happy_insert_subsidiary_menu', 10 );
		
	/* insert the footer template part */
	
	add_action( "{$prefix}_close_body", 'happy_insert_footer_template', 10 );

}

	/* Adds support for a custom header image. */

 	require( get_template_directory() . '/includes/custom-header.php' );

/**
 * Registers scripts for the theme and enqueue those used sitewide.
 *
 * @since 0.1.0.
 */

function happy_scripts() {
	
	wp_register_script( 'happy-custom', get_template_directory_uri() . '/js/happy-custom.js', array( 'jquery', 'fitvids' ), '20120206', true );
	wp_register_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );
	wp_register_script( 'small-menu-secondary', get_template_directory_uri() . '/js/small-menu-secondary.js', array( 'jquery' ), '20120206', true );
	wp_register_script( 'fitvids', get_template_directory_uri() . '/js/fitvids.js', array( 'jquery' ), '20120206', true );
	
	wp_enqueue_script( 'happy-custom' );
	wp_enqueue_script( 'small-menu' );
	wp_enqueue_script( 'small-menu-secondary' );
	wp_enqueue_script( 'fitvids' );
	
	/*
	 * Loads Google font CSS file.
	 *
 	 * To disable in a child theme, use wp_dequeue_style()
 	 * function happychildtheme_dequeue_fonts() {
 	 *     wp_dequeue_style( 'happy-fonts' );
 	 * }
	 * add_action( 'wp_enqueue_scripts', 'happychildtheme_dequeue_fonts', 11 );
 	 */
	
	$protocol = is_ssl() ? 'https' : 'http';
	
	wp_enqueue_style( 'happy-fonts', "$protocol://fonts.googleapis.com/css?family=Ubuntu:400,700,400italic,700italic", array(), null );

}



/**
 * Registers new sidebars for the theme.
 *
 * @since 0.1.0.
 */

function happy_register_sidebars() {

	register_sidebar( 
	
		array( 
			'name'		=>	__( 'Feature', 'happy' ), 
			'id'			=>	'feature', 
			'description'	=>	__( 'Displayed in the feature area.', 'happy' ), 
			'before_widget' 	=> 	'<aside id="%1$s" class="widget %2$s widget-%2$s">',
			'after_widget' 	=> 	'</aside>',
			'before_title'	=>	'<h3 class="widget-title">', 
			'after_title'	=>	'</h3>' 
		) 
	
	);

}

/**
 * Filters Hybrid Core sidebar defaults for the theme.
 *
 * @since 0.1.0.
 */

function happy_change_sidebar_defaults() {
	
	$defaults = array(
		'before_widget' 	=> 	'<aside id="%1$s" class="widget %2$s widget-%2$s">',
		'after_widget' 	=> 	'</aside>',
		'before_title' 	=> 	'<h3 class="widget-title">',
		'after_title' 	=> 	'</h3>'
	);
	
	return $defaults;
	
}


/**
 * Sets default comment and ping status
 * to off for "Page" post types
 * 
 */

function happy_change_comment_status() {
	
	add_filter( 'option_default_comment_status', '__return_false' );
	add_filter( 'option_default_ping_status', '__return_false' );

}



/**
 * Function for deciding which pages should have a one-column layout.
 *
 * @since 0.1.0
 */
function happy_one_column() {

	if ( ! is_active_sidebar( 'primary' ) && ! is_active_sidebar( 'secondary' ) )
		
		add_filter( 'get_theme_layout', 'happy_post_layout_one_column' );

	elseif ( is_attachment() )
		
		add_filter( 'get_theme_layout', 'happy_post_layout_one_column' );

}


/**
 * Filters 'get_post_layout' by returning 'layout-1c'.
 *
 * @since 0.1.0
 */

function happy_post_layout_one_column( $layout ) {
	
	return 'layout-1c';

}

/**
 * Disables sidebars if viewing a one-column page.
 *
 * @since 0.1.0
 */

function happy_disable_sidebars( $sidebars_widgets ) {
	
	global $wp_query;

	if ( current_theme_supports( 'theme-layouts' ) ) {

		if ( 'layout-1c' == theme_layouts_get_layout() ) {
			
			$sidebars_widgets['primary'] = false;
			$sidebars_widgets['secondary'] = false;
		
		}
	
	}

	return $sidebars_widgets;
}


/**
 * Overwrites the default widths for embeds.  This is especially useful for making sure videos properly
 * expand the full width on video pages.  This function overwrites what the $content_width variable handles
 * with context-based widths.
 *
 * @since 0.1.0
 */

function happy_embed_defaults( $args ) {

	if ( current_theme_supports( 'theme-layouts' ) ) {

		$layout = theme_layouts_get_layout();

		if ( 'layout-3c-l' == $layout || 'layout-3c-r' == $layout || 'layout-3c-c' == $layout )
			$args['width'] = 500;
		elseif ( 'layout-1c' == $layout )
			$args['width'] = 928;
		else
			$args['width'] = 650;
	
	} else {
		
		$args['width'] = 650;
		
	}

	return $args;

}

/**
 * Hook in the header template part
 * default location is before_main, priority 5
 *
 * @since 0.1.0.
 */
function happy_insert_header_template() {

	get_template_part( 'part' , 'header' );
	 
}

/**
 * Enable the home feature widget area
 * default location is before_main
 *
 * @since 0.1.0.
 */

function happy_insert_feature_template() {

	get_template_part( 'part', 'feature' );			
		
}

/**
 * Insert the WordPress customer header
 * default location is 'feature', priority 5
 *
 * @since 0.1.0.
 */

function happy_insert_custom_header() {

	$header_image = get_header_image();
	
	if ( ! empty( $header_image ) ) : ?>
		
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
	
	<?php endif; 		
		
}

/**
 * Hook in the feature sidebar
 * default location is feature, priority 10
 *
 * @since 0.1.0.
 */
function happy_insert_feature_sidebar() {

	get_sidebar( 'feature' ); // Loads the sidebar-primary.php template.
	 
}

/**
 * Hook in the primary menu
 * default location is before_header
 *
 * @since 0.1.0.
 */
function happy_insert_primary_menu() {

	get_template_part( 'menu', 'primary' );
	 
}

/**
 * Hook in the secondary menu
 * default location is after_header
 *
 * @since 0.1.0.
 */
function happy_insert_secondary_menu() {

	get_template_part( 'menu', 'secondary' );
	 
}

/**
 * Hook in the subsidiary menu
 * default location is after_main, priority 5
 *
 * @since 0.1.0.
 */
function happy_insert_subsidiary_menu() {

	get_template_part( 'menu', 'subsidiary' ); // Load the menu-subsidiary.php template.
	 
}

/**
 * Hook in the primary sidebar
 * default location is after_content, priority 5
 *
 * @since 0.1.0.
 */
function happy_insert_primary_sidebar() {

	get_sidebar( 'primary' ); // Loads the sidebar-primary.php template.
	 
}

/**
 * Hook in the secondary sidebar
 * default location is after_content, priority 10
 *
 * @since 0.1.0.
 */
function happy_insert_secondary_sidebar() {

	get_sidebar( 'secondary' ); // Loads the sidebar-secondary.php template.
	 
}

/**
 * Hook in the after-singular sidebar
 * default location is after_singular, priority 10
 *
 * @since 0.1.0.
 */
function happy_insert_after_singular_sidebar() {

	get_sidebar( 'after-singular' ); // Loads the sidebar-after-singular.php template.
	 
}

/**
 * Hook in the subsidiary sidebar
 * default location is after_main, priority 10
 *
 * @since 0.1.0.
 */
function happy_insert_subsidiary_sidebar() {

	get_sidebar( 'subsidiary' );
	 
}

/**
 * Hook in the footer template part
 * default location is close_body, priority 10
 *
 * @since 0.1.0.
 */
function happy_insert_footer_template() {

	get_template_part( 'part' , 'footer' );
	 
}


/**
 * Wraps the output of the quote post format content in a <blockquote> element if the user hasn't added a 
 * <blockquote> in the post editor.
 *
 * @note This function is used from Justin Tadlock's Theme Hybrid community
 * @since 0.1.0
 * @param string $content The post content.
 * @return string $content
 */
 
function happy_quote_content( $content ) {

	if ( has_post_format( 'quote' ) ) {
		
		preg_match( '/<blockquote.*?>/', $content, $matches );

		if ( empty( $matches ) )
			
			$content = "<blockquote>{$content}</blockquote>";
	
	}

	return $content;
}

/**
 * Grabs the first URL from the post content of the current post.  This is meant to be used with the link post 
 * format to easily find the link for the post. 
 *
 * @since 0.1.0
 * @return string The link if found.  Otherwise, the permalink to the post.
 *
 * @note This is copied from Justin Tadlock's Theme Hybrid. He modified it from twenty eleven - see below.
 * @note This is a modified version of the twentyeleven_url_grabber() function in the TwentyEleven theme.
 * @author wordpressdotorg
 * @copyright Copyright (c) 2011 - 2012, wordpressdotorg
 * @link http://wordpress.org/extend/themes/twentyeleven
 * @license http://wordpress.org/about/license
 */
function happy_url_grabber() {
	
	if ( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', get_the_content(), $matches ) )
		
		return get_permalink( get_the_ID() );

	return esc_url_raw( $matches[1] );

}

/**
 * Returns the number of images attached to the current post in the loop.
 *
 * @since 0.1.0
 * @return int
 * @note This is copied from Justin Tadlock's Theme Hybrid theme, Picturesque.
 * @author Justin Tadlock
 * @copyright Copyright (c), Justin Tadlock
 * @link http://themehybrid.com
 */
function happy_get_image_attachment_count() {
	
	$images = get_children( array( 'post_parent' => get_the_ID(), 'post_type' => 'attachment', 'post_mime_type' => 'image', 'numberposts' => -1 ) );
	
	return count( $images );

}

/**
 * Returns the featured image for the image post format if the user didn't add any content to the post.
 *
 * @note This function is used from Justin Tadlock's Theme Hybrid community
 * @since 0.1.0
 * @param string $content The post content.
 * @return string $content
 */
function happy_image_content( $content ) {

	if ( has_post_format( 'image' ) && '' == $content ) {
		if ( is_singular() )
			$content = get_the_image( array( 'size' => 'full', 'meta_key' => false, 'link_to_post' => false ) );
		else
			$content = get_the_image( array( 'size' => 'full', 'meta_key' => false ) );
	}

	return $content;
}


/**
 * Adds infinity symbol to asides
 *
 * This function filters the content and, if it's the "aside" post format, adds the infinity symbol
 * It runs at priority nine so that it goes before wpautop()
 *
 * @note credit Justin Tadlock - http://justintadlock.com/archives/2012/09/06/post-formats-aside 
 * @since 0.1.0
 * @param string $content The post content.
 * @return string $content
 */
 
function happy_aside_infinity( $content ) {

	if ( has_post_format( 'aside' ) && !is_singular() )
		
		$content .= ' <a href="' . esc_url( get_permalink() ) . '"> &#8734; </a>';

	return $content;
}