<?php
/**
 * Content Template
 *
 * Displays content to be called by get_template_part() in various templates
 *
 * @package happy
 * @subpackage Template
 */
?>
<?php do_atomic( 'before_entry' ); // Before loop hook ?>

<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

	<?php do_atomic( 'open_entry' ); // Open loop hook ?>

	<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'meta_key' => array( 'Thumbnail' ), 'size' => 'thumbnail' ) ); ?>

	<header class="entry-header">
		<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
	
		<?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( 'By [entry-author] on [entry-published] [entry-edit-link before=" | "]', 'happy' ) . '</div>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<?php echo apply_atomic_shortcode( 'entry_meta', '<footer class="entry-meta entry-footer">' . __( '[entry-terms taxonomy="category" before="Posted in "] [entry-terms before="| Tagged "] [entry-comments-link before=" | "]', 'happy' ) . '</footer>' ); ?>

	<?php do_atomic( 'close_entry' ); // Close loop hook ?>

</article><!-- .hentry -->

<?php do_atomic( 'after_entry' ); // After loop hook ?>
