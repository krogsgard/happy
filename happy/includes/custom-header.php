<?php
/**
 * Implements an optional custom header for Happy.
 * See http://codex.wordpress.org/Custom_Headers
 *
 * @package WordPress
 * @subpackage happy
 * @since Happy 0.1
 * @notes This header code adapted from twentytwelve default WordPress theme
 */

/**
 * Sets up the WordPress core custom header arguments and settings.
 *
 * @uses add_theme_support() to register support for 3.4 and up.
 * @uses happy_header_style() to style front-end.
 * @uses happy_admin_header_style() to style wp-admin form.
 * @uses happy_admin_header_image() to add custom markup to wp-admin form.
 *
 * @since Happy 0.1
 */
function happy_custom_header_setup() {
	$args = array(
		// Text color and image (empty to use none).
		'header-text'     => false,
		'default-image'          => '',

		// Set height and width, with a maximum value for the width.
		'height'                 => 250,
		'width'                  => 1140,
		'max-width'              => 2000,

		// Support flexible height and width.
		'flex-height'            => true,
		'flex-width'             => true,

		// Random image rotation off by default.
		'random-default'         => false,

		// Callbacks for styling the header and the admin preview.
		'wp-head-callback'       => 'happy_admin_header_style',
		'admin-head-callback'    => '',
		'admin-preview-callback' => 'happy_admin_header_image',
	);

	add_theme_support( 'custom-header', $args );
}
add_action( 'after_setup_theme', 'happy_custom_header_setup' );

/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @since Twenty Twelve 1.0
 */
function happy_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		border: none;
	}
	#headimg img {
		max-width: <?php echo get_theme_support( 'custom-header', 'max-width' ); ?>px;
	}
	</style>
<?php
}

/**
 * Outputs markup to be displayed on the Appearance > Header admin panel.
 * This callback overrides the default markup displayed there.
 *
 * @since Twenty Twelve 1.0
 */
function happy_admin_header_image() {
	?>
	<div id="headimg">
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
		<?php endif; ?>
	</div>
<?php }