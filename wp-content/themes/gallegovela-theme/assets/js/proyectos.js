( function () {
	'use strict';

	var grid = document.getElementById( 'gv-projects-grid' );
	var status = document.getElementById( 'gv-projects-status' );

	if ( ! grid || ! status || typeof gallegovelaCatalog === 'undefined' ) {
		return;
	}

	var loaded = parseInt( status.getAttribute( 'data-loaded' ), 10 ) || 0;
	var total = parseInt( status.getAttribute( 'data-total' ), 10 ) || 0;
	var loading = false;

	function updateStatus() {
		status.querySelector( '.gv-catalog__count' ).textContent = loaded + ' / ' + total;

		var more = status.querySelector( '.gv-catalog__more' );

		if ( loaded >= total ) {
			if ( more ) {
				more.remove();
			}
			observer.disconnect();
		} else if ( ! more ) {
			more = document.createElement( 'span' );
			more.className = 'gv-catalog__more';
			status.appendChild( more );
		}

		if ( more ) {
			more.textContent = 'Scroll para mostrar más';
		}
	}

	function loadMore() {
		if ( loading || loaded >= total ) {
			return;
		}

		loading = true;

		var body = new URLSearchParams();
		body.set( 'action', 'gallegovela_load_projects' );
		body.set( 'nonce', gallegovelaCatalog.nonce );
		body.set( 'offset', loaded );

		fetch( gallegovelaCatalog.ajaxUrl, {
			method: 'POST',
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
			body: body.toString(),
		} )
			.then( function ( response ) { return response.json(); } )
			.then( function ( response ) {
				if ( ! response.success ) {
					return;
				}

				grid.insertAdjacentHTML( 'beforeend', response.data.html );
				loaded = response.data.loaded;
				total = response.data.total;
				updateStatus();
			} )
			.finally( function () {
				loading = false;
			} );
	}

	var observer = new IntersectionObserver( function ( entries ) {
		if ( entries[ 0 ].isIntersecting ) {
			loadMore();
		}
	} );

	observer.observe( status );
} )();
