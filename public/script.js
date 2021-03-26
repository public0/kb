function scrollToElm(sel) {
    $('html, body').animate({
        scrollTop: $(sel).offset().top
    }, 2000);
}

function changeLang(elem) {
    if (elem) {
        document.cookie = "lang=" + elem + ";";
    }
    window.location.reload();
}

(function($) {
    "use strict";
    // ______________Back to top Button
    $(window).on("scroll", function(e) {
        if ($(this).scrollTop() > 0) {
            $('#back-to-top').fadeIn('slow');
        } else {
            $('#back-to-top').fadeOut('slow');
        }
    });
    $("#back-to-top").on("click", function(e){
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
})(jQuery);
