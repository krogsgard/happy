<?php
/**
 * Header Template
 *
 * The header template is generally used on every page of your site. Nearly all other
 * templates call it somewhere near the top of the file. It is used mostly as an opening
 * wrapper, which is closed with the footer.php file. It also executes key functions needed
 * by the theme, child themes, and plugins. 
 *
 * @package happy
 * @subpackage Template
 */
 
?>
<!DOCTYPE html>
<!--[if lte IE 7 ]> <html class="ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]> <html class="ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]> <html class="ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="<?php echo esc_attr( get_bloginfo( 'html_type' ) ); ?>; charset=<?php echo esc_attr( get_bloginfo( 'charset' ) ); ?>" />

<?php echo apply_filters( 'meta_viewport', '<meta name="viewport" content="width=device-width, initial-scale=1">' ); ?>

<title><?php hybrid_document_title(); ?></title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); // WP head hook ?>

</head>

<body class="<?php hybrid_body_class(); ?>">

	<?php do_atomic( 'open_body' ); // Open body hook ?>

	<div id="container">
		
		<?php do_atomic( 'before_main' ); // Before main hook ?>

		<div id="main">
		
		<?php do_atomic( 'open_main' ); // Open main hook ?>	

			<div class="wrap">			