<?php
/**
 * Primary Sidebar Template
 *
 * Displays widgets for the Primary dynamic sidebar if any have been added to the sidebar through the 
 * widgets screen in the admin by the user.  Otherwise, nothing is displayed.
 *
 * @package happy
 * @subpackage Template
 */

if ( is_active_sidebar( 'primary' ) ) : ?>

	<?php do_atomic( 'before_sidebar_primary' ); // happy_before_sidebar_primary ?>

	<div id="sidebar-primary" class="sidebar" role="complementary">

		<?php do_atomic( 'open_sidebar_primary' ); // happy_open_sidebar_primary ?>

		<?php dynamic_sidebar( 'primary' ); ?>

		<?php do_atomic( 'close_sidebar_primary' ); // happy_close_sidebar_primary ?>

	</div><!-- #sidebar-primary .aside -->

	<?php do_atomic( 'after_sidebar_primary' ); // happy_after_sidebar_primary ?>

<?php endif; ?>