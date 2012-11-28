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
?>
	
	<div id="feature">
	
	<?php do_atomic( 'open_feature' ); // Open feature hook ?>

		<div class="wrap">			
		
		<?php do_atomic( 'feature' ); // feature area hook ?>					
		
		</div><!-- .wrap -->
		
	<?php do_atomic( 'close_feature' ); // Close feature hook ?>
	
	</div><!-- #feature -->	