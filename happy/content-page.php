<?php
/**
 * Page Content Template
 *
 * Displays content to be called by get_template_part() in page templates
 *
 * @package happy
 * @subpackage Template
 */
?>
<?php do_atomic( 'before_entry' ); // Before entry hook ?>

<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

	<?php do_atomic( 'open_entry' ); // Open entry hook ?>

	<?php echo apply_atomic( 'entry_title', the_title( '<h1 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h1>', false ) ); ?>

	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', hybrid_get_textdomain() ) ); ?>
		<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', hybrid_get_textdomain() ), 'after' => '</p>' ) ); ?>
	</div><!-- .entry-content -->

	<?php do_atomic( 'close_entry' ); // Close entry hook ?>

</div><!-- .hentry -->

<?php do_atomic( 'after_entry' ); // After entry hook ?>

<?php comments_template( '/comments.php', false ); ?>