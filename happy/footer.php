<?php
/**
 * Footer Template
 *
 * The footer template is generally used on every page of your site. Nearly all other
 * templates call it somewhere near the bottom of the file. It is used mostly as a closing
 * wrapper, which is opened with the header.php file. It also executes key functions needed
 * by the theme, child themes, and plugins. 
 *
 * @package happy
 * @subpackage Template
 */
?>
	
				<?php get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>

				<?php get_sidebar( 'secondary' ); // Loads the sidebar-secondary.php template. ?>

				<?php do_atomic( 'after_content' ); // After content hook ?>
						

			</div><!-- .wrap -->

			<?php do_atomic( 'close_main' ); // Close main hook ?>
			
		</div><!-- #main -->

		<?php do_atomic( 'after_main' ); // After main hook ?>
		
		<?php get_sidebar( 'subsidiary' ); // Load the sidebar-subsidiary.php template. ?>

		<?php get_template_part( 'menu', 'subsidiary' ); // Load the menu-subsidiary.php template. ?>
		
		<?php do_atomic( 'before_footer' ); // Before footer hook ?>
		
		<footer id="footer">

			<?php do_atomic( 'open_footer' ); // Open footer hook ?>

			<div class="wrap">

				<?php echo apply_atomic_shortcode( 'footer_content', hybrid_get_setting( 'footer_insert' ) ); ?>

				<?php do_atomic( 'footer' ); // Footer hook ?>

			</div><!-- .wrap -->

			<?php do_atomic( 'close_footer' ); // Close footer hook ?>

		</footer><!-- #footer -->

		<?php do_atomic( 'after_footer' ); // After footer hook ?>

	</div><!-- #container -->

	<?php wp_footer(); // WordPress footer hook ?>
	<?php do_atomic( 'close_body' ); // After HTML hook ?>

</body>
</html>