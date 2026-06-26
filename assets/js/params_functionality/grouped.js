jQuery(document).ready(function () {
	function applyGroupColors( context ) {
		jQuery( '[data-wcp-group-color]', context ).each( function () {
			jQuery( this ).css( 'border-left', '5px solid ' + jQuery( this ).data( 'wcp-group-color' ) );
		} );
	}

	applyGroupColors( document );

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
