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
	
	add_action( 'wp_enqueue_scripts', 'happy_scripts' );
	
	// change defaults for sidebar parameters
	
	add_filter( "{$prefix}_sidebar_defaults", 'happy_change_sidebar_defaults' );
	

	/* enable this filter to remove the home page entry title "Home". Don't forget to remove the function as well */

	add_filter ( 'happy_entry_title', 'happy_remove_entry_title' );

	/* uncomment to add the feature-home-feature template below the logo - also note the function below infobase_home_feature
	 * by default the home feature template grabs the feature sidebar on the page set as the front page in the reading settings.
	 * to override this, copy the feature-home-feature.php template from the parent theme and put it in the child theme
	 * here you can change whatever you like.
	 */
 
	add_action( 'happy_after_header', 'happy_home_feature');

}

function happy_scripts() {
	
	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'small-menu-secondary', get_template_directory_uri() . '/js/small-menu-secondary.js', array( 'jquery' ), '20120206', true );

}



/**
 * Registers new sidebars for the theme.
 *
 * @since 0.1.0.
 */
function happy_register_sidebars() {

	register_sidebar( array( 'name' => __( 'Feature', 'happy' ), 'id' => 'feature', 'description' => __( 'Displayed in the feature area.', 'happy' ), 'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-inside">', 'after_widget' => '</div></div>', 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ) );

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

	if ( !is_active_sidebar( 'primary' ) && !is_active_sidebar( 'secondary' ) )
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
	}
	else
		$args['width'] = 650;

	return $args;
}
		
/* enable this function w/ the corresponding filter above to remove the home page entry title "Home" */

function happy_remove_entry_title( $title ) {

	if( is_front_page() )
	{
		$title = '';
	}

	return $title;
} 

/* this will enable the home feature widget area */ 


function happy_home_feature() {

	get_template_part('feature', 'home-feature');			
		
}

?>