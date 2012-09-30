<?php
/**
 * Loop Meta Template
 *
 * Displays information at the top of the page about archive and search results when viewing those pages.  
 * This is not shown on the home page and singular views.
 *
 * @package happy
 * @subpackage Template
 */
?>
<?php if ( is_home() && !is_front_page() ) : ?>

	<?php global $wp_query; ?>

	<header class="loop-meta">

		<h1 class="loop-title"><?php echo get_post_field( 'post_title', $wp_query->get_queried_object_id() ); ?></h1>

		<div class="loop-description">
			<?php echo apply_filters( 'the_excerpt', get_post_field( 'post_excerpt', $wp_query->get_queried_object_id() ) ); ?>
		</div><!-- .loop-description -->

	</header><!-- .loop-meta -->

<?php elseif ( is_category() ) : ?>

	<header class="loop-meta">

		<h1 class="loop-title"><?php single_cat_title(); ?></h1>

		<div class="loop-description">
			<?php echo category_description(); ?>
		</div><!-- .loop-description -->

	</header><!-- .loop-meta -->

<?php elseif ( is_tag() ) : ?>

	<header class="loop-meta">

		<h1 class="loop-title"><?php single_tag_title(); ?></h1>

		<div class="loop-description">
			<?php echo tag_description(); ?>
		</div><!-- .loop-description -->

	</header><!-- .loop-meta -->

<?php elseif ( is_tax() ) : ?>

	<header class="loop-meta">

		<h1 class="loop-title"><?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h1>

		<div class="loop-description">
			<?php echo term_description( '', get_query_var( 'taxonomy' ) ); ?>
		</div><!-- .loop-description -->

	</header><!-- .loop-meta -->

<?php elseif ( is_author() ) : ?>

	<?php $id = get_query_var( 'author' ); ?>

	<header id="hcard-<?php the_author_meta( 'user_nicename', $id ); ?>" class="loop-meta vcard">

		<h1 class="loop-title fn n"> <?php the_author_meta( 'display_name', $id ); ?></h1>

		<div class="loop-description">
			<?php echo get_avatar( get_the_author_meta( 'user_email', $id ), '100', '', get_the_author_meta( 'display_name', $id ) ); ?>

			<div class="user-bio author-bio">
				<?php the_author_meta( 'description', $id ); ?>
			</div><!-- .user-bio .author-bio -->
		</div><!-- .loop-description -->

	</header><!-- .loop-meta -->

<?php elseif ( is_search() ) : ?>

	<header class="loop-meta">

		<h1 class="loop-title"><?php echo esc_attr( get_search_query() ); ?></h1>

		<div class="loop-description">
			<p>
			<?php printf( __( 'You are browsing the search results for &quot;%1$s&quot;', 'happy' ), esc_attr( get_search_query() ) ); ?>
			</p>
		</div><!-- .loop-description -->

	</header><!-- .loop-meta -->

<?php elseif ( is_date() ) : ?>

	<header class="loop-meta">
		<h1 class="loop-title"><?php _e( 'Archives by date', 'happy' ); ?></h1>

		<div class="loop-description">
			<p>
			<?php _e( 'You are browsing the site archives by date.', 'happy' ); ?>
			</p>
		</div><!-- .loop-description -->

	</header><!-- .loop-meta -->

<?php elseif ( function_exists( 'is_post_type_archive' ) && is_post_type_archive() ) : ?>

	<?php $post_type = get_post_type_object( get_query_var( 'post_type' ) ); ?>

	<header class="loop-meta">

		<h1 class="loop-title"><?php echo $post_type->labels->name; ?></h1>

	</header><!-- .loop-meta -->

<?php elseif ( is_archive() ) : ?>

	<header class="loop-meta">

		<h1 class="loop-title"><?php _e( 'Archives', 'happy' ); ?></h1>

		<div class="loop-description">
			<p>
			<?php _e( 'You are browsing the site archives.', 'happy' ); ?>
			</p>
		</div><!-- .loop-description -->

	</header><!-- .loop-meta -->

<?php endif; ?>