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

		<div class="wrap">		

		
		<?php get_sidebar( 'feature' ); ?>
					
		
		</div><!-- .wrap -->
	
	</div><!-- #home-feature -->
	
<?php } else { } ?>	