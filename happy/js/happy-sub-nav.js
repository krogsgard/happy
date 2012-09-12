/* Brian Dichiara wrote this magic */

jQuery( function( $ ){ 
     
     $( '.site-navigation li' ).each( function( i, el ) { 
         
          if ( $( this ).find( 'ul' ).length > 0 ) {
               
               var $span = $( '<span />' ).addClass( 'sub-indicator' ).html( ' &raquo; ' );
               
               $( this ).addClass( 'has-sub' ).find( 'a:first' ).append( $span );
         
          }
     
     });

});