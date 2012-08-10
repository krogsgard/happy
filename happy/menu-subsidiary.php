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

	<nav id="menu-subsidiary" role="navigation" class="subsidiary-navigation site-navigation">
		<h1 class="assistive-text"><?php _e( 'Navigation', hybrid_get_textdomain() ); ?></h1>
		<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', hybrid_get_textdomain() ); ?>"><?php _e( 'Skip to content', hybrid_get_textdomain() ); ?></a></div>

		<div class="wrap">

			<?php do_atomic( 'open_menu_subsidiary' ); // Open subsidiary menu hook ?>

			<?php wp_nav_menu( array( 'theme_location' => 'subsidiary', 'container_class' => 'menu', 'menu_class' => '', 'menu_id' => 'menu-subsidiary-items', 'fallback_cb' => '' ) ); ?>

			<?php do_atomic( 'close_menu_subsidiary' ); // Close subsidiary menu hook ?>
			
		</div><!-- .wrap -->

	</nav><!-- #menu-subsidiary .menu-container -->

	<?php do_atomic( 'after_menu_subsidiary' ); // After subsidiary menu hook ?>

<?php endif; ?>