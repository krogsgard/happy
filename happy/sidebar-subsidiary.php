<?php
/**
 * Subsidiary Sidebar Template
 *
 * The subsidiary sidebar template houses the HTML used for the 'subsidiary' sidebar.
 * It will first check if the sidebar is active before displaying anything.
 *
 * @package happy
 * @subpackage Template
 */

if ( is_active_sidebar( 'subsidiary' ) ) : ?>

	<?php do_atomic( 'before_sidebar_subsidiary' ); // Before subsidiary sidebar hook ?>

	<div id="sidebar-subsidiary" class="sidebar aside">

		<?php do_atomic( 'open_sidebar_subsidiary' ); // Open subsidiary sidebar hook ?>

		<?php dynamic_sidebar( 'subsidiary' ); ?>

		<?php do_atomic( 'close_sidebar_subsidiary' ); // Close subsidiary sidebar hook ?>

	</div><!-- #sidebar-subsidiary .aside -->

	<?php do_atomic( 'after_sidebar_subsidiary' ); // After subsidiary sidebar hook ?>

<?php endif; ?>