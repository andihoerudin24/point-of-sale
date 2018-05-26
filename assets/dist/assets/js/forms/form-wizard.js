// Form Wizard JavaScripts

(function ($) {
	'use strict';

	var $validator = $("#shipping-form").validate({
	    rules: {
	        firstName: {
		        required: true,
		        minlength: 3
		    },
		    lastName: {
		        required: true,
		        minlength: 3
		    },
		    email: {
		        required: true,
		        minlength: 3,
		        email: true
		    },
		    address: {
		    	required: true
		    },
		    state: {
		    	required: true
		    },	
		    city: {
		    	required: true
		    },
		    postcode: {
		    	required: true,
		    	minlength: 3
		    },
		    creditCard: {
		    	required: true,
		    	minlength: 12,
		    	maxlength: 12
		    },
		    cvv: {
		    	required: true,
		    	minlength: 3,
		    	maxlength: 3
		    },
		    mmyy: {
		    	required: true,
		    	minlength: 4,
		    	maxlength: 4
		    },
		    cardName: {
		    	required: true
		    }
	    }
	});

	function validationChecking() {
	    var $valid = $('#shipping-form').valid();
	    if (!$valid) {
	        $validator.focusInvalid();
	        return false;
	    }
	}

  	$('#rootwizard').bootstrapWizard({
  		tabClass: '',
	    'nextSelector': '.button-next',
	    'previousSelector': '.button-previous',
	    onNext: validationChecking,
	    onLast: validationChecking,
	    onTabClick: validationChecking,
  		onTabShow: function(tab, navigation, index) {
			var $total = navigation.find('li').length;
			var $current = index+0;
			var $percent = ($current/$total) * 133;
			$('#rootwizard .progress-bar').css({width:$percent+'%'});
		}});
})(jQuery);
