<?php
/**
 * Front-Page Template
 *
 * The Front-Page template is a placeholder for archives views without a more specific template. 
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

					<?php get_template_part( 'content', ( post_type_supports( get_post_type(), 'post-formats' ) ? get_post_format() : get_post_type() ) ); ?>
				
				<?php endwhile; ?>

			<?php endif; ?>
			
			<?php do_atomic( 'close_hfeed' ); // Close hfeed hook ?>

		</section><!-- .hfeed -->

		<?php do_atomic( 'close_content' ); // Close content hook ?>

	</div><!-- #content -->

<?php get_footer(); ?>