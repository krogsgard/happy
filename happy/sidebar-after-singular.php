<?php
/**
 * After Singular Sidebar Template
 *
 * The After Singular sidebar template houses the HTML used for the 'Utility: After Singular' 
 * sidebar.  If widgets are present, they will be displayed.
 *
 * @package happy
 * @subpackage Template
 */

if ( is_active_sidebar( 'after-singular' ) ) : ?>

	<div id="sidebar-after-singular" class="sidebar">

		<?php dynamic_sidebar( 'after-singular' ); ?>

	</div><!-- #sidebar-after-singular -->

<?php endif; ?>