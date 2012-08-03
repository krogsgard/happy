<?php
/**
 * Primary Menu Template
 *
 * Displays the Primary Menu if it has active menu items.
 *
 * @package happy
 * @subpackage Template
 */

if ( has_nav_menu( 'primary' ) ) : ?>

	<?php do_atomic( 'before_menu_primary' ); // Before primary menu hook ?>

	<nav id="menu-primary" role="navigation" class="primary-navigation site-navigation">
		<h1 class="assistive-text"><?php _e( 'Menu Primary', hybrid_get_textdomain() ); ?></h1>
		<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', hybrid_get_textdomain() ); ?>"><?php _e( 'Skip to content', hybrid_get_textdomain() ); ?></a></div>

			<?php do_atomic( 'open_menu_primary' ); // Open primary menu hook ?>

			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'menu', 'menu_class' => '', 'menu_id' => 'menu-primary-items', 'fallback_cb' => '' ) ); ?>

			<?php do_atomic( 'close_menu_primary' ); // Close primary menu hook ?>

	</nav><!-- #menu-primary .menu-container -->

	<?php do_atomic( 'after_menu_primary' ); // After primary menu hook ?>

<?php endif; ?>