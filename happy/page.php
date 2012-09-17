<?php
/**
 * Page Template
 *
 * This is the default page template.  It is used when a more specific template can't be found to display
 * singular views of posts (any post type).
 *
 * @package happy
 * @subpackage Template
 */

get_header(); ?>

	<?php do_atomic( 'before_content' ); // Before content hook ?>

	<div id="content">

		<?php do_atomic( 'open_content' ); // Open content hook ?>

		<section class="hfeed">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

				<?php endwhile; ?>

			<?php endif; ?>

		</section><!-- .hfeed -->

		<?php do_atomic( 'close_content' ); // Close content hook ?>

		<?php get_template_part( 'loop-nav' ); ?>

	</div><!-- #content -->


<?php get_footer(); ?>