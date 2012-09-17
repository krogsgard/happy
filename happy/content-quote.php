<?php
/**
 * Content Template for the "Quote" post format
 *
 * Displays the "Quote" post format content to be called by get_template_part() in the various templates
 *
 * @package happy
 * @subpackage Template
 */
?>
<?php do_atomic( 'before_entry' ); // Before loop hook ?>

<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

	<?php do_atomic( 'open_entry' ); // Open loop hook ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

	<?php echo apply_atomic_shortcode( 'entry_meta', '<footer class="entry-meta entry-footer">' . __( '[post-format-link] Posted [entry-published][entry-terms taxonomy="category" before=" in "] [entry-permalink before=" | "] [entry-terms before="| Tagged "] [entry-comments-link before=" | "]', 'happy' ) . '</footer>' ); ?>

	<?php do_atomic( 'close_entry' ); // Close loop hook ?>

</article><!-- .hentry -->

<?php do_atomic( 'after_entry' ); // After loop hook ?>
