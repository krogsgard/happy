<?php
/**
 * Search Template
 *
 * The search template is loaded when a visitor uses the search form to search for something
 * on the site.
 *
 * @package Happy
 * @subpackage Template
 */

get_header(); ?>

	<?php do_atomic( 'before_content' ); // Before content hook ?>

	<div id="content" role="main">

		<?php do_atomic( 'open_content' ); // Open content hook ?>

		<section class="hfeed">

			<?php get_template_part( 'loop-meta' ); // Get the loop meta box ?>

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

			<?php endif; ?>

		</section><!-- .hfeed -->

		<?php do_atomic( 'close_content' ); // Close content hook ?>

		<?php get_template_part( 'loop-nav' ); ?>

	</div><!-- #content -->

<?php get_footer(); ?>