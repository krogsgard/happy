<?php
/**
 * Secondary Sidebar Template
 *
 * Displays widgets for the Secondary dynamic sidebar if any have been added to the sidebar through the 
 * widgets screen in the admin by the user.  Otherwise, nothing is displayed.
 *
 * @package happy
 * @subpackage Template
 */

if ( is_active_sidebar( 'secondary' ) ) : ?>

	<?php do_atomic( 'before_sidebar_secondary' ); // happy_before_sidebar_secondary ?>

	<div id="sidebar-secondary" class="sidebar" role="complementary">

		<?php do_atomic( 'open_sidebar_secondary' ); // happy_open_sidebar_secondary ?>

		<?php dynamic_sidebar( 'secondary' ); ?>

		<?php do_atomic( 'close_sidebar_secondary' ); // happy_close_sidebar_secondary ?>

	</div><!-- #sidebar-secondary .aside -->

	<?php do_atomic( 'after_sidebar_secondary' ); // happy_after_sidebar_secondary ?>

<?php endif; ?>