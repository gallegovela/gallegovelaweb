( function ( $ ) {
	'use strict';

	$( function () {
		var frame;
		var $button  = $( '#gv_proyecto_galeria_seleccionar' );
		var $input   = $( '#gv_proyecto_galeria' );
		var $preview = $( '#gv_proyecto_galeria_preview' );

		if ( ! $button.length ) {
			return;
		}

		$button.on( 'click', function ( e ) {
			e.preventDefault();

			if ( frame ) {
				frame.open();
				return;
			}

			frame = wp.media( {
				title: gvProyectoAdmin.title,
				button: { text: gvProyectoAdmin.buttonText },
				multiple: true,
			} );

			frame.on( 'select', function () {
				var attachments = frame.state().get( 'selection' ).toJSON();
				var ids = [];

				$preview.empty();

				attachments.forEach( function ( attachment ) {
					ids.push( attachment.id );
					var thumb = attachment.sizes && attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.url;
					$preview.append( '<img src="' + thumb + '" width="60" height="60">' );
				} );

				$input.val( ids.join( ',' ) );
			} );

			frame.open();
		} );
	} );
} )( jQuery );
