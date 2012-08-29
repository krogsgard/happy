<?php
/**
 * Sidebar Header Template
 *
 * @package happy
 * @subpackage Template
 */

if ( is_active_sidebar( 'header' ) ) : ?>

	<?php do_atomic( 'before_sidebar_header' ); // happy_before_sidebar_header ?>

	<div id="sidebar-header" class="sidebar">

		<?php do_atomic( 'open_sidebar_header' ); // happy_open_sidebar_header ?>

		<?php dynamic_sidebar( 'header' ); ?>

		<?php do_atomic( 'close_sidebar_header' ); // happy_close_sidebar_header ?>

	</div><!-- #sidebar-header .aside -->

	<?php do_atomic( 'after_sidebar_header' ); // happy_after_sidebar_header ?>

<?php endif; ?>