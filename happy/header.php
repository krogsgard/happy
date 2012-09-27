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
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title><?php hybrid_document_title(); ?></title>

<!-- For iPad 5 -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-144x144-precomposed.png">
<!-- For iPhone 4 -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-114x114-precomposed.png">
<!-- For iPad 1-->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-72x72-precomposed.png">
<!-- For iPhone 3G, iPod Touch and Android -->
<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-57x57-precomposed.png">
<!-- For everything else -->
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">

<?php 
wp_enqueue_style( 'styleDev', get_template_directory_uri().'/style.dev.css', '', '1.0' );
//wp_enqueue_style( 'style', get_template_directory_uri().'/style.css', '', '1.0' ); 
?>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php

if ( is_singular( 'post' ) ) wp_enqueue_script( 'comment-reply' );

// WP head hook
wp_head();
?>

</head>

<body class="<?php hybrid_body_class(); ?>" role="application">

	<?php do_atomic( 'open_body' ); // Open body hook ?>

	<div id="container">

		<?php do_atomic( 'before_header' ); // Before header hook ?>
		
		<?php get_template_part( 'menu', 'primary' ); ?>

		<header id="header" role="banner">

			<?php do_atomic( 'open_header' ); // Open header hook ?>

			<div class="wrap">
                            
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
		
		<?php do_atomic( 'open_main' ); // Open main hook ?>	

			<div class="wrap">			