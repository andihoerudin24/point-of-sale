// Email JavaScripts

(function ($) {
	'use strict';
  	
	function secSideNavToggle() {
		$('.side-nav-2-toggle').on('click', function(e) {
	        $('.email-app').toggleClass("mail-nav-active");
	        e.preventDefault();
	    });
	}

	function openMail() {
		$('.open-mail, .back-to-mailbox').on('click', function(e) {
	        $('.email-content').toggleClass("open");
	        e.preventDefault();
	    });
	}

	$('#compose-area').summernote({
		height: 400
	});

	$('#send-to').selectize({
	    delimiter: ',',
	    persist: false,
	    create: function(input) {
	        return {
	            value: input,
	            text: input
	        }
	    }
	});

	function init() {
	    secSideNavToggle();
	    openMail();
	}
	init();	

})(jQuery);
