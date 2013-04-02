<?php
/**
 * Index Template
 *
 * This is the default template.  It is used when a more specific template can't be found to display
 * posts.  It is unlikely that this template will ever be used, but there may be rare cases.
 *
 * @package infobuesiness
 * @subpackage Template
 */

get_header(); ?>

	<?php do_atomic( 'before_content' ); // Before content hook ?>

	<div id="content" role="main">

		<?php do_atomic( 'open_content' ); // Open content hook ?>

		<div class="hfeed">
		
			<?php do_atomic( 'open_hfeed' ); // Open hfeed hook ?>

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

			<?php endif; ?>
			
			<?php do_atomic( 'close_hfeed' ); // Close hfeed hook ?>

		</div><!-- .hfeed -->

		<?php do_atomic( 'close_content' ); // Close content hook ?>

	</div><!-- #content -->


<?php get_footer(); ?>