<?php
/**
 * Feature Home Feature Template
 *
 * This is the template for use in the home feature page template.  There is an available same action hook in the functions.php file of the 
 * child theme to use as a sample in how to enable this
 *
 * @package happy
 * @subpackage Template
 */
 
if ( is_front_page() ) { ?>
	
	<div id="home-feature">
	
	<?php do_atomic( 'open_home_feature' ); // Open home feature hook ?>

		<div class="wrap">		

		
		<?php get_sidebar( 'feature' ); ?>
					
		
		</div><!-- .wrap -->
		
	<?php do_atomic( 'close_home_feature' ); // Close home feature hook ?>
	
	</div><!-- #home-feature -->
	
<?php } else { } ?>	