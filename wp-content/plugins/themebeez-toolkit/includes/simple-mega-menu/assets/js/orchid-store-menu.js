( function( $ ) {

	$( document ).ready( function() {		

		$( 'body' ).on( 'click', '.menu-icon-picker-btn', function( e ) {

			e.preventDefault();

			var iconPickerVal = $( this ).val();

			if( iconPickerVal == '' ) {
				$( this ).parents( '.menu-icon-field' ).find( '.menu-icon-holder' ).html( '' );
			} else {
				var icon = '<span class="menu-icon-holder"><i class="fa '+iconPickerVal+'"></i></span>';
				$( this ).parents( '.menu-icon-field' ).find( '.menu-icon-holder-wrapper' ).html( icon );
			}

			$( this ).parents( '.menu-icon-field' ).find( '.menu-icon-input' ).val( iconPickerVal );
		} );

		$( 'body' ).on( 'click', '.menu-remove-icon', function( e ) {

			e.preventDefault();

			$( this ).parents( '.menu-icon-field' ).find( '.menu-icon-input' ).val( '' );

			$( this ).parents( '.menu-icon-field' ).find( '.menu-icon-holder-wrapper' ).html( '' );

		} );

		$( 'body' ).on( 'click', '.menu-select-icon', function( e ) {

			e.preventDefault();

			var iconsWrapper = $( this ).parents( '.menu-icon-field' ).find( '.menu-icons-picker-wrapper' );

			$.ajax({

                url : orchid_store_ajax_script.ajax_url,

                type : 'POST',
                
                data : {
                    action : 'simple_mega_menu_fontawesome_icons_list_action',
                    nonce : orchid_store_ajax_script.nonce
                },

                success : function( response ) {

                	if( response ) {

                		iconsWrapper.append( response );

                		iconsWrapper.toggle();
                	}
                }
            });

		} );

	} );

} ) ( jQuery );