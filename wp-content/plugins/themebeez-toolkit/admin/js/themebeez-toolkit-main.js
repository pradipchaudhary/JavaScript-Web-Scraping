(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	$('.jsthemebeezimport-data').on('click', function () {

        var attr = $(this).attr('disabled');

        if (typeof attr !== typeof undefined && attr !== false) {

            return;
        }
        // Reset response div content.
        $('.jsthemebeezajax-response').empty();

        // Prepare data for the AJAX call
        var data = new FormData();
        data.append( 'action', 'TT_import_demo_data' );
        data.append( 'security', tt_admin_ajax.ajax_nonce );
        data.append( 'selected', $(this).attr( 'data-index' ) );//$('#TT__demo-import-files').val());
        if ($('#TT__content-file-upload').length) {
            data.append('content_file', $('#TT__content-file-upload')[0].files[0]);
        }
        if ($('#TT__widget-file-upload').length) {
            data.append('widget_file', $('#TT__widget-file-upload')[0].files[0]);
        }
        if ($('#TT__customizer-file-upload').length) {
            data.append('customizer_file', $('#TT__customizer-file-upload')[0].files[0]);
        }
        $(this).closest('.theme').attr('class', 'theme');
        $(this).closest('.theme').find('.notice').remove();
        // AJAX call to import everything (content, widgets, before/after setup)
        ajaxCall(data, $(this));

    });

    function ajaxCall(data, $this) {
        var $notice_node;
        if ($this.hasClass('no-data-exists')) {

            $('.et-no-data').html('');

            $notice_node = $('.et-no-data');

        } else {
            $notice_node = $this.closest('.theme');
        }
        $.ajax({
            method: 'POST',
            url: tt_admin_ajax.ajax_url,
            data: data,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $('.jsthemebeezimport-data').attr('disabled', 'disabled');
                $this.addClass('updating-message');
                $this.closest('.theme').addClass('focus');
                $this.text('Importing..');
            }
        }).done(function (response) {

                if ('undefined' !== typeof response.status && 'newAJAX' === response.status) {
                    ajaxCall(data, $this);
                } else if ('undefined' !== typeof response.message) {
                    var success = '<div class="notice update-message notice-success notice-alt"><p>' + response.message + '</p></div>';
                    $this.closest('.theme').addClass('theme-install-success');
                    $notice_node.append(success);
                    $('.jsthemebeezajax-loader').hide();
                    $this.removeClass('updating-message');
                    $this.closest('.theme').removeClass('focus');
                    $('.jsthemebeezimport-data').removeAttr('disabled');
                } else {
                    var error = '<div class="notice update-message notice-error notice-alt"><p>' + response + '</p></div>';
                    $this.closest('.theme').addClass('theme-install-failed');
                    $notice_node.append(error);
                    $('.jsthemebeezajax-loader').hide();
                    $this.removeClass('updating-message');
                    $this.closest('.theme').removeClass('focus');
                    $('.jsthemebeezimport-data').removeAttr('disabled');
                }
                $this.text('Import Demo');
            }).fail(function (error) {
                
                var error = '<div class="notice update-message notice-error notice-alt"><p>Error: ' + error.statusText + ' (' + error.status + ')' + '</p></div>';
                $this.closest('.theme').addClass('theme-install-failed');
                $notice_node.append(error);
                $('.jsthemebeezajax-loader').hide();
                $this.removeClass('updating-message');
                $this.closest('.theme').removeClass('focus');
                $('.jsthemebeezimport-data').removeAttr('disabled');
                $this.text('Import Demo');
            });
    }

    // Switch preview images on select change event, but only if the img element .jsthemebeezpreview-image exists.
    // Also switch the import notice (if it exists).
    $('#TT__demo-import-files').on('change', function () {
        if ($('.jsthemebeezpreview-image').length) {

            // Attempt to change the image, else display message for missing image.
            var currentFilePreviewImage = mg.import_files[this.value]['import_preview_image_url'] || '';
            $('.jsthemebeezpreview-image').prop('src', currentFilePreviewImage);
            $('.jsthemebeezpreview-image-message').html('');

            if ('' === currentFilePreviewImage) {
                $('.jsthemebeezpreview-image-message').html(mg.texts.missing_preview_image);
            }
        }

        // Update import notice.
        var currentImportNotice = mg.import_files[this.value]['import_notice'] || '';
        $('.jsthemebeezdemo-import-notice').html(currentImportNotice);
    });

})( jQuery );
