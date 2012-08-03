<?php
/**
 * subsidiary Menu Template
 *
 * Displays the subsidiary Menu if it has active menu items.
 *
 * @package happy
 * @subpackage Template
 */

if ( has_nav_menu( 'subsidiary' ) ) : ?>

	<?php do_atomic( 'before_menu_subsidiary' ); // Before subsidiary menu hook ?>

	<div id="menu-subsidiary" class="menu-container">

			<?php do_atomic( 'open_menu_subsidiary' ); // Open subsidiary menu hook ?>

			<?php wp_nav_menu( array( 'theme_location' => 'subsidiary', 'container_class' => 'menu', 'depth' => 1, 'menu_class' => '', 'menu_id' => 'menu-subsidiary-items', 'fallback_cb' => '' ) ); ?>

			<?php do_atomic( 'close_menu_subsidiary' ); // Close subsidiary menu hook ?>

	</div><!-- #menu-subsidiary .menu-container -->

	<?php do_atomic( 'after_menu_subsidiary' ); // After subsidiary menu hook ?>

<?php endif; ?>