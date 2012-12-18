<?php
/**
 * Content Template for the "Gallery" post format
 *
 * Displays the "Gallery" post format content to be called by get_template_part() in the various templates
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
	
		<?php get_template_part( 'loop', 'byline' ); ?>
		
	</header><!-- .entry-header -->
	
	<?php do_atomic( 'before_the_content' ); // before content hook ?>

	<div class="entry-summary">
		
		<?php the_excerpt(); ?>
		
		<?php $count = happy_get_image_attachment_count(); ?>
			
			<p class="image-count">
			
			<?php $count = apply_filters( 'happy_gallery_count', sprintf( _n( 'This gallery contains %s image. ', 'This gallery contains %s images. ', $count, 'happy' ), $count ) ); 
			
				$date = apply_filters( 'happy_gallery_more', sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
					    esc_url( get_permalink() ),
					    esc_attr( get_the_title() ),
					    __( 'View All Images &raquo; ', 'happy' )
					)
				);
				
				echo $count;
				echo $date; ?>
				
			</p>

	</div><!-- .entry-summary -->

	<?php get_template_part( 'loop', 'entry-meta' ); ?>

	<?php do_atomic( 'close_entry' ); // Close loop hook ?>

</article><!-- .hentry -->

<?php do_atomic( 'after_entry' ); // After loop hook ?>
