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

				<?php do_atomic( 'after_content' ); // After content hook ?>			

			</div><!-- .wrap -->

			<?php do_atomic( 'close_main' ); // Close main hook ?>
			
		</div><!-- #main -->

		<?php do_atomic( 'after_main' ); // After main hook ?>

	</div><!-- #container -->
	
	<?php do_atomic( 'close_body' ); // After HTML hook ?>
	
	<?php wp_footer(); // WordPress footer hook ?>

</body>
</html>