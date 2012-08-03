<?php
/**
 * secondary Menu Template
 *
 * Displays the secondary Menu if it has active menu items.
 *
 * @package happy
 * @subpackage Template
 */

if ( has_nav_menu( 'secondary' ) ) : ?>

	<?php do_atomic( 'before_menu_secondary' ); // Before secondary menu hook ?>

	<nav id="menu-secondary" role="navigation" class="secondary-navigation site-navigation">
		<h1 class="assistive-text"><?php _e( 'Menu Primary', hybrid_get_textdomain() ); ?></h1>
		<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', hybrid_get_textdomain() ); ?>"><?php _e( 'Skip to content', hybrid_get_textdomain() ); ?></a></div>

		<div class="wrap">

			<?php do_atomic( 'open_menu_secondary' ); // Open secondary menu hook ?>

			<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'container_class' => 'menu', 'menu_class' => '', 'menu_id' => 'menu-secondary-items', 'fallback_cb' => '' ) ); ?>

			<?php do_atomic( 'close_menu_secondary' ); // Close secondary menu hook ?>
			
		</div><!-- .wrap -->

	</nav><!-- #menu-secondary .menu-container -->

	<?php do_atomic( 'after_menu_secondary' ); // After secondary menu hook ?>

<?php endif; ?>