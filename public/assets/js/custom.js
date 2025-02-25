(function ($) {
    "use strict";

    $.fn.andSelf = function () {
        return this.addBack.apply(this, arguments);
    }

    /*
    |=================
    | fancybox
    |================
    */

    $("[data-fancybox]").fancybox({});


    /*
    |===============
    | WOW ANIMATION
    |==================
    */
    var wow = new WOW({
        mobile: false
    });
    wow.init();

}(jQuery));
