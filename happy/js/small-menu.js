/**
 * Handles toggling the main navigation menu for small screens.
 */
jQuery( document ).ready( function( $ ) {
	var $masthead = $( '#header' ),
	    timeout = false;

	$.fn.smallMenu = function() {
		$masthead.find( '#menu-primary' ).removeClass( 'primary-navigation' ).addClass( 'main-small-navigation' );
		$masthead.find( '#menu-secondary' ).removeClass( 'secondary-navigation' ).addClass( 'main-small-secondary-navigation' );
		$masthead.find( '.site-navigation h1' ).removeClass( 'assistive-text' ).addClass( 'menu-toggle' );

		$( '.menu-toggle' ).unbind( 'click' ).click( function() {
			$masthead.find( '.menu' ).toggle();
			$( this ).toggleClass( 'toggled-on' );
		} );
	};

	// Check viewport width on first load.
	if ( $( window ).width() < 600 )
		$.fn.smallMenu();

	// Check viewport width when user resizes the browser window.
	$( window ).resize( function() {
		var browserWidth = $( window ).width();

		if ( false !== timeout )
			clearTimeout( timeout );

		timeout = setTimeout( function() {
			if ( browserWidth < 600 ) {
				$.fn.smallMenu();
			} else {
				$masthead.find( '#menu-primary' ).removeClass( 'main-small-navigation' ).addClass( 'primary-navigation' );
				$masthead.find( '#menu-secondary' ).removeClass( 'main-small-secondary-navigation' ).addClass( 'secondary-navigation' );
				$masthead.find( '.site-navigation h1' ).removeClass( 'menu-toggle' ).addClass( 'assistive-text' );
				$masthead.find( '.menu' ).removeAttr( 'style' );
			}
		}, 200 );
	} );
} );