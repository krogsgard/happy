<?php
/**
 * Footer Template
 *
 * The footer template part is generally called in the footer.php file. 
 * This template part is in it's own file so that markup for the <footer> element can be separated
 * from the important footer.php file that many WordPress features rely on. 
 *
 * @package happy
 * @subpackage Template
 */
?>
<?php do_atomic( 'before_footer' ); // Before footer hook ?>
		
	<footer id="footer" role="contentinfo">

		<?php do_atomic( 'open_footer' ); // Open footer hook ?>

		<div class="wrap">

			<?php echo apply_atomic_shortcode( 'footer_content', hybrid_get_setting( 'footer_insert' ) ); ?>

			<?php do_atomic( 'footer' ); // Footer hook ?>

		</div><!-- .wrap -->

		<?php do_atomic( 'close_footer' ); // Close footer hook ?>

	</footer><!-- #footer -->

<?php do_atomic( 'after_footer' ); // After footer hook ?>