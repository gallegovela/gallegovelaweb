( function () {
	'use strict';

	var grid = document.getElementById( 'gv-posts-grid' );
	var status = document.getElementById( 'gv-posts-status' );
	var searchForm = document.getElementById( 'gv-blog-search-form' );
	var searchInput = document.getElementById( 'gv-blog-search-input' );

	if ( ! grid || ! status || typeof gallegovelaCatalog === 'undefined' ) {
		return;
	}

	var loaded = parseInt( status.getAttribute( 'data-loaded' ), 10 ) || 0;
	var total = parseInt( status.getAttribute( 'data-total' ), 10 ) || 0;
	var loading = false;
	var filters = { search: '', categories: [], tags: [] };

	function updateStatus() {
		status.querySelector( '.gv-catalog__count' ).textContent = loaded + ' / ' + total;

		var more = status.querySelector( '.gv-catalog__more' );

		if ( loaded >= total ) {
			if ( more ) {
				more.remove();
			}
		} else if ( ! more ) {
			more = document.createElement( 'span' );
			more.className = 'gv-catalog__more';
			status.appendChild( more );
		}

		if ( more ) {
			more.textContent = 'Scroll para mostrar más';
		}
	}

	function buildBody( offset ) {
		var body = new URLSearchParams();
		body.set( 'action', 'gallegovela_load_posts' );
		body.set( 'nonce', gallegovelaCatalog.nonce );
		body.set( 'offset', offset );
		body.set( 'search', filters.search );
		filters.categories.forEach( function ( id ) {
			body.append( 'categories[]', id );
		} );
		filters.tags.forEach( function ( id ) {
			body.append( 'tags[]', id );
		} );
		return body;
	}

	function fetchPosts( offset, replace ) {
		if ( loading ) {
			return;
		}

		loading = true;

		fetch( gallegovelaCatalog.ajaxUrl, {
			method: 'POST',
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
			body: buildBody( offset ).toString(),
		} )
			.then( function ( response ) { return response.json(); } )
			.then( function ( response ) {
				if ( ! response.success ) {
					return;
				}

				if ( replace ) {
					grid.innerHTML = response.data.html || '<p class="gv-blog__empty">No se ha encontrado contenido.</p>';
				} else {
					grid.insertAdjacentHTML( 'beforeend', response.data.html );
				}

				loaded = response.data.loaded;
				total = response.data.total;
				updateStatus();
			} )
			.finally( function () {
				loading = false;
			} );
	}

	function loadMore() {
		if ( loaded < total ) {
			fetchPosts( loaded, false );
		}
	}

	function applyFilters() {
		loaded = 0;
		total = 0;
		fetchPosts( 0, true );
	}

	var observer = new IntersectionObserver( function ( entries ) {
		if ( entries[ 0 ].isIntersecting ) {
			loadMore();
		}
	} );
	observer.observe( status );

	if ( searchForm ) {
		searchForm.addEventListener( 'submit', function ( event ) {
			event.preventDefault();
			filters.search = searchInput ? searchInput.value.trim() : '';
			applyFilters();
		} );
	}

	function toggleFilterGroup( containerId, list ) {
		var container = document.getElementById( containerId );

		if ( ! container ) {
			return;
		}

		container.addEventListener( 'click', function ( event ) {
			var button = event.target.closest( '.gv-blog-filter__item' );

			if ( ! button ) {
				return;
			}

			var termId = button.getAttribute( 'data-term-id' );
			var index = list.indexOf( termId );

			if ( index === -1 ) {
				list.push( termId );
				button.classList.add( 'is-active' );
			} else {
				list.splice( index, 1 );
				button.classList.remove( 'is-active' );
			}

			applyFilters();
		} );
	}

	toggleFilterGroup( 'gv-blog-filter-categories', filters.categories );
	toggleFilterGroup( 'gv-blog-filter-tags', filters.tags );
} )();
