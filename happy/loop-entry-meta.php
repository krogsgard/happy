<?php
/**
 * Loop Entry Meta Template
 *
 * Displays the entry-meta on archives and single post views.
 *
 * @package happy
 * @subpackage Template
*/

$format = get_post_format();

switch( $format ) {
	case 'aside':
	if ( is_singular() && is_main_query() ) {
		echo apply_atomic_shortcode( 'entry_meta', '<footer class="entry-meta entry-footer">' . __( '[post-format-link] Posted by [entry-author] on [entry-published] [entry-permalink before=" | "] [entry-comments-link before=" | "]', 'happy' ) . '</footer>' ); 
	} else {
		echo apply_atomic_shortcode( 'entry_meta', '<footer class="entry-meta entry-footer">' . __( '[post-format-link] Posted [entry-published]', 'happy' ) . '</footer>' ); 
	}

	break;

	case 'gallery':
	case 'image':
	case 'link':
	case 'quote':
	case 'video':
		echo apply_atomic_shortcode( 'entry_meta', '<footer class="entry-meta entry-footer">' . __( '[post-format-link] Posted by [entry-author] on [entry-published] [entry-terms taxonomy="category" before=" in "] [entry-permalink before=" | "] [entry-terms before="| Tagged "] [entry-comments-link before=" | "]', 'happy' ) . '</footer>' );
	break;

	default:
		echo apply_atomic_shortcode( 'entry_meta', '<footer class="entry-meta entry-footer">' . __( '[entry-terms taxonomy="category" before="Posted in "] [entry-terms before="| Tagged "] [entry-comments-link before=" | "]', 'happy' ) . '</footer>' );
	break;
}