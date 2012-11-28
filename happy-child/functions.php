<?php 

/* Child theme setup function
 *****************************
 **************************
 ***********************
 *********************
 */
  
add_action( 'after_setup_theme', 'happychild_theme_setup', 11 );

function happychild_theme_setup() {



	
/* Add the search form to the secondary menu. Uncommenting this action will put a searchform at the end of the 
 * secondary menu 
 */
	
	// add_action( "{$prefix}_close_menu_secondary", 'get_search_form' );
	
/* To unregister sidebars currently in the parent theme, do so with the following action. Also remember to 
 * uncomment the corresponding function further down this functionsfile
 */
	
	// add_action( 'widgets_init', 'happy_unregister_sidebars', 11 );
	
/* For sites that may require a page have its own custom stylesheet, such as a landing page or form page where main site styles
 * are not wanted, enable the following feature, and then you can create stylesheet for custom pages 
 */
 
	// add_theme_support( 'post-stylesheets' );

/*
	// add image sizes for this site
	add_image_size( 'tiny', 80, 80, true );
	add_image_size( 'wide-thumb', 220, 120, true );
	add_image_size( 'feature', 940, 370, true );

*/

}

/* End setup function. All functions go after this. Actions and filters should go above
 ************************************************************************************
 ***********************************************************************************
 *********************************************************************************
 *******************************************************************************
 *****************************************************************************
 ***************************************************************************
 *************************************************************************
 ***********************************************************************
 *********************************************************************
 * Start functions after this. All actions and filters should go above
 */


/**
 * Adds custom image sizes for use
 * typically with feature widget areas
 * to add a custom image size, follow the method below
 * make the names applicable to the application
 * 
 */


/**
 * Unregisters some of the core framework sidebars that the theme doesn't use.
 *
 * @since 0.1.0
 */

function happy_unregister_sidebars() {
	unregister_sidebar( 'header' );
	unregister_sidebar( 'after-singular' );
}


