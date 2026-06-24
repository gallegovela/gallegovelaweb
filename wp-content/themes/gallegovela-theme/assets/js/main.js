( function () {
	'use strict';

	var toggle = document.getElementById( 'gv-menu-toggle' );
	var menu = document.getElementById( 'gv-primary-menu' );

	if ( ! toggle || ! menu ) {
		return;
	}

	toggle.addEventListener( 'click', function () {
		var isOpen = menu.classList.toggle( 'is-open' );
		toggle.setAttribute( 'aria-expanded', isOpen ? 'true' : 'false' );
	} );
} )();
