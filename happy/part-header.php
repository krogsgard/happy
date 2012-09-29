<?php
/**
 * Header Template
 *
 * The header template part is generally called in the header.php file. 
 * This template part is in it's own file so that markup for the <header> element can be separated
 * from the important header.php file that many WordPress features rely on. 
 *
 * @package happy
 * @subpackage Template
 */
?>
<?php do_atomic( 'before_header' ); // Before header hook ?>

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