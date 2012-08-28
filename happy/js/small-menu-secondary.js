/**
 * Handles toggling the main navigation menu for small screens.
 */
jQuery( document ).ready( function( $ ) {
	var $container = $( '#container' ),
	    timeout = false;

	$.fn.smallSecondaryMenu = function() {
		$container.find( '#menu-secondary' ).removeClass( 'secondary-navigation' ).addClass( 'main-small-secondary-navigation' );
		$container.find( '#menu-secondary h1' ).removeClass( 'assistive-text' ).addClass( 'menu-toggle' );

		$( '.menu-toggle' ).unbind( 'click' ).click( function() {
			$( this ).parents( '.site-navigation' ).find( '.menu' ).toggle();
			$( this ).toggleClass( 'toggled-on' );
		} );
	};

	// Check viewport width on first load.
	if ( $( window ).width() < 600 )
		$.fn.smallSecondaryMenu();

	// Check viewport width when user resizes the browser window.
	$( window ).resize( function() {
		var browserWidth = $( window ).width();

		if ( false !== timeout )
			clearTimeout( timeout );

		timeout = setTimeout( function() {
			if ( browserWidth < 600 ) {
				$.fn.smallSecondaryMenu();
			} else {
				$container.find( '#menu-secondary' ).removeClass( 'main-small-secondary-navigation' ).addClass( 'secondary-navigation' );
				$container.find( '#menu-secondary h1' ).removeClass( 'menu-toggle' ).addClass( 'assistive-text' );
				$container.find( '#menu-secondary .menu' ).removeAttr( 'style' );
			}
		}, 200 );
	} );
} );