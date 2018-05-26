// FAQ JavaScripts

(function ($) {
	'use strict';

    $('.scroll-to').on('click', function() {
        $('html, body').animate({
            scrollTop: $(this.hash).offset().top - 80
        }, 300);
        return false;
    });

    $(".sticky").sticky({topSpacing:80});

})(jQuery);
