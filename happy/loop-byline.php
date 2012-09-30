<?php
/**
 * Loop Byline Template
 *
 * Displays the byline on archives and single post views.
 *
 * @package happy
 * @subpackage Template
 */

$format = get_post_format();

switch( $format ) {
	case 'aside':
	case 'gallery':
	case 'image':
	case 'link':
	case 'quote':
	case 'video':
	break;

	default:
	echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( 'By [entry-author] on [entry-published] [entry-edit-link before=" | "]', 'happy' ) . '</div>' ); 
	break;
}