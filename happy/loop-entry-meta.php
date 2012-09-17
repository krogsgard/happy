<?php
/**
 * Loop Entry Meta Template
 *
 * Displays the entry-meta on archives and single post views.
 *
 * @package happy
 * @subpackage Template
 */
?>

	<?php
		
	$format = get_post_format();
	
	switch( $format ) {
	   
	    case 'aside':
	    
	        echo apply_atomic_shortcode( 'entry_meta', '<footer class="entry-meta entry-footer">' . __( '[post-format-link] Posted [entry-published][entry-terms taxonomy="category" before=" in "] [entry-permalink before=" | "] [entry-terms before="| Tagged "] [entry-comments-link before=" | "]', 'happy' ) . '</footer>' ); 
	    
	        break;
	    
	    case 'image':
	    
	        echo apply_atomic_shortcode( 'entry_meta', '<footer class="entry-meta entry-footer">' . __( '[post-format-link] Posted [entry-published][entry-terms taxonomy="category" before=" in "] [entry-permalink before=" | "] [entry-terms before="| Tagged "] [entry-comments-link before=" | "]', 'happy' ) . '</footer>' ); 
	    
	        break;

	    case 'link':
	        
	        echo apply_atomic_shortcode( 'entry_meta', '<footer class="entry-meta entry-footer">' . __( '[post-format-link] Posted [entry-published][entry-terms taxonomy="category" before=" in "] [entry-permalink before=" | "] [entry-terms before="| Tagged "] [entry-comments-link before=" | "]', 'happy' ) . '</footer>' ); 
	    
	        break;
	    
	    case 'quote':
	        
	        echo apply_atomic_shortcode( 'entry_meta', '<footer class="entry-meta entry-footer">' . __( '[post-format-link] Posted [entry-published][entry-terms taxonomy="category" before=" in "] [entry-permalink before=" | "] [entry-terms before="| Tagged "] [entry-comments-link before=" | "]', 'happy' ) . '</footer>' );
	    
	        break;

	    case 'status':
	        
	        echo apply_atomic_shortcode( 'entry_meta', '<footer class="entry-meta entry-footer">' . __( '[post-format-link] [entry-comments-link before=" | "]', 'happy' ) . '</footer>' );
	    
	        break;
	    
	    case 'video':
	        
	        echo apply_atomic_shortcode( 'entry_meta', '<footer class="entry-meta entry-footer">' . __( '[post-format-link] Posted [entry-published][entry-terms taxonomy="category" before=" in "] [entry-permalink before=" | "] [entry-terms before="| Tagged "] [entry-comments-link before=" | "]', 'happy' ) . '</footer>' );
	    
	        break;
	    
	    default:
	        
	        echo apply_atomic_shortcode( 'entry_meta', '<footer class="entry-meta entry-footer">' . __( 'Default entry meta [entry-terms taxonomy="category" before="Posted in "] [entry-terms before="| Tagged "] [entry-comments-link before=" | "]', 'happy' ) . '</footer>' );
	    
	        break;
	
	}