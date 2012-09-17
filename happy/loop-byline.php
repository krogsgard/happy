<?php
/**
 * Loop Byline Template
 *
 * Displays the byline on archives and single post views.
 *
 * @package happy
 * @subpackage Template
 */
?>

	<?php
		
	$format = get_post_format();
	
	switch( $format ) {
	   
	    case 'aside':
	    
	        echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( '[post-format-link] Posted [entry-published][entry-terms taxonomy="category" before=" in "] [entry-permalink before=" | "] [entry-terms before="| Tagged "] [entry-comments-link before=" | "]', 'happy' ) . '</div>' );
	    
	        break;
	    
	    case 'image':
	    
	        echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( '[post-format-link] Posted [entry-published][entry-terms taxonomy="category" before=" in "] [entry-permalink before=" | "] [entry-terms before="| Tagged "] [entry-comments-link before=" | "]', 'happy' ) . '</div>' );
	    
	        break;

	    case 'link':
	          
	        break;
	    
	    case 'quote':
	    
	        break;

	    case 'status':
	    
	        break;
	    
	    case 'video':
	        
	        echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( '[post-format-link] Posted [entry-published][entry-terms taxonomy="category" before=" in "] [entry-permalink before=" | "] [entry-terms before="| Tagged "] [entry-comments-link before=" | "]', 'happy' ) . '</div>' );
	    
	        break;
	    
	    default:
	        
	        echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( 'Default byline - By [entry-author] on [entry-published] [entry-edit-link before=" | "]', 'happy' ) . '</div>' ); 
	    
	        break;
	
	}