<?php
/**
 * Comments Template
 *
 * Lists comments and calls the comment form.  Individual comments have their own
 * templates.  The hierarchy for these templates is $comment_type.php, comment.php.
 *
 * @package happy
 * @subpackage Template
 */

if ( 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) )
	die( __( 'Please do not load this page directly. Thanks!', 'happy' ) );

if ( post_password_required() || ( !have_comments() && !comments_open() && !pings_open() ) )
	return;
?>

<div id="comments-template">

	<div class="comments-wrap">

		<div id="comments">

			<?php if ( have_comments() ) : ?>

				<h3 id="comments-number" class="comments-header"><?php comments_number( __( 'No Responses', 'happy' ), __( 'One Response', 'happy' ), __( '% Responses', 'happy' ) ); ?></h3>

				<?php do_atomic( 'before_comment_list' );// Before comment list hook ?>

				<ol class="comment-list">
					<?php wp_list_comments( hybrid_list_comments_args() ); ?>
				</ol><!-- .comment-list -->

				<?php do_atomic( 'after_comment_list' ); // After comment list hook ?>

				<?php if ( get_option( 'page_comments' ) ) : ?>
					<div class="comment-navigation paged-navigation">
						<?php paginate_comments_links(); ?>
					</div><!-- .comment-navigation -->
				<?php endif; ?>

			<?php endif; ?>

		</div><!-- #comments -->

		<?php comment_form(); // Load the comment form. ?>

	</div><!-- .comments-wrap -->

</div><!-- #comments-template -->