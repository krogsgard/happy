<?php
/**
 * Singlular Content Template
 *
 * Displays content to be called by get_template_part() in singular templates
 *
 * @package happy
 * @subpackage Template
 */
?>
<?php do_atomic( 'before_entry' ); // Before entry hook ?>

<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

	<?php do_atomic( 'open_entry' ); // Open entry hook ?>

	<header class="entry-header">

		<?php echo apply_atomic( 'entry_title', the_title( '<h1 class="entry-title">', '</h1>', false ) ); ?>
		
		<?php do_atomic( 'after_title' ); // after title hook ?>
	
		<?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( 'By [entry-author] on [entry-published] [entry-edit-link before=" | "]', 'happy' ) . '</div>' ); ?>
		
		<?php do_atomic( 'after_byline' ); // after title hook ?>
	
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'happy' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'happy' ), 'after' => '</p>' ) ); ?>
	</div><!-- .entry-content -->
	
	<?php do_atomic( 'after_the_content' ); // after title hook ?>

	<?php echo apply_atomic_shortcode( 'entry_meta', '<footer class="entry-meta entry-footer">' . __( '[entry-terms taxonomy="category" before="Posted in "] [entry-terms before="| Tagged "] [entry-comments-link before=" | "]', 'happy' ) . '</footer>' ); ?>

	<?php do_atomic( 'close_entry' ); // Close entry hook ?>

</article><!-- .hentry -->

<?php do_atomic( 'after_entry' ); // After entry hook ?>

<?php get_sidebar( 'after-singular' ); ?>

<?php do_atomic( 'after_singular' ); // After singular hook ?>

<?php comments_template( '/comments.php', true ); ?>