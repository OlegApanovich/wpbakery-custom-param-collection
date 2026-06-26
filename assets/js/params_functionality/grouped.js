jQuery(document).ready(function () {
	function isFirstInRow( el ) {
		var prev = el.previousElementSibling;
		return !prev || Math.round( el.getBoundingClientRect().top ) !== Math.round( prev.getBoundingClientRect().top );
	}

	function applyGroupColors( context ) {
		jQuery( '[data-wcp-group-color]', context )
			.filter( function () { return isFirstInRow( this ); } )
			.each( function () {
				jQuery( this ).css( 'border-left', '5px solid ' + jQuery( this ).data( 'wcp-group-color' ) );
			} );
	}

	applyGroupColors( document );

	var resizeTimer;
	jQuery( window ).on( 'resize', function () {
		clearTimeout( resizeTimer );
		resizeTimer = setTimeout( function () {
			applyGroupColors( document );
		}, 100 );
	} );

	var observer = new MutationObserver( function ( mutations ) {
		mutations.forEach( function ( mutation ) {
			jQuery( mutation.addedNodes ).filter( function () {
				return this.nodeType === 1;
			} ).each( function () {
				applyGroupColors( this.parentNode );
			} );
		} );
	} );

	observer.observe( document.body, { childList: true, subtree: true } );
});
