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
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title><?php hybrid_document_title(); ?></title>

<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="all" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); // WP head hook ?>

</head>

<body class="<?php hybrid_body_class(); ?>">

	<?php do_atomic( 'open_body' ); // Open body hook ?>

	<div id="container">

		<?php do_atomic( 'before_header' ); // Before header hook ?>

		<header id="header" role="banner">

			<?php do_atomic( 'open_header' ); // Open header hook ?>

			<div class="wrap">
			
			<?php get_template_part( 'menu', 'primary' ); ?>
                            
				<hgroup id="branding">
					
					<h1 id="site-title"><a href="<?php echo home_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><span><?php bloginfo( 'name' ); ?></span></a></h1>
					
					<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>									
				
				</hgroup><!-- #branding -->		

				<?php do_atomic( 'header' ); // Header hook ?>
				
				<?php get_sidebar( 'header' ); ?>

				
			</div><!-- .wrap -->

			<?php do_atomic( 'close_header' ); // Close header hook ?>

		</header><!-- #header -->
		
		<?php do_atomic( 'after_header' ); // After header hook ?>
		
		<?php get_template_part( 'menu', 'secondary' ); ?>	
		

		<?php do_atomic( 'before_main' ); // Before main hook ?>

		<div id="main">

			<div class="wrap">
			
			<?php do_atomic( 'open_main' ); // Open main hook ?>
			