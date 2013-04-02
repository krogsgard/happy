<?php
/**
 * Singular Template
 *
 * This is the default singular template.  It is used when a more specific template can't be found to display
 * singular views of posts (any post type).
 *
 * @package happy
 * @subpackage Template
 */

get_header(); ?>

	<?php do_atomic( 'before_content' ); // Before content hook ?>

	<div id="content" role="main">

		<?php do_atomic( 'open_content' ); // Open content hook ?>

		<section class="hfeed">
			
			<?php do_atomic( 'open_hfeed' ); // Open hfeed hook ?>

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'single' ); ?>

				<?php endwhile; ?>

			<?php endif; ?>
			
			<?php do_atomic( 'close_hfeed' ); // Close hfeed hook ?>

		</section><!-- .hfeed -->

		<?php do_atomic( 'close_content' ); // Close content hook ?>

	</div><!-- #content -->

<?php get_footer(); ?>