jQuery(document).ready(function ($) {
    $('form.quform').Quform();
    if ($.isFunction($.fn.qtip)) {
        $('.quform-tooltip').qtip({
            content: {text: false},
            style: {classes: 'qtip-default qtip-shadow quform-tt', width: '180px'},
            position: {my: 'left center', at: 'right center', viewport: $(window), adjust: {method: 'shift'}}
        });
    }
    $('#subject').replaceSelectWithTextInput({onValue: 'Other'});
});
(function ($) {
    $(window).on('load', function () {
        var images = ['/template_b/quform/images/close.png', '/template_b/quform/images/success.png', '/template_b/quform/images/error.png', '/template_b/quform/images/default-loading.gif'];
        if ($('.quform-theme-light-light, .quform-theme-light-rounded').length) {
            images = images.concat(['/template_b/quform/themes/light/images/button-active-bg-rep.png', '/template_b/quform/themes/light/images/close.png', '/template_b/quform/themes/light/images/input-active-bg-rep.png']);
        }
        if ($('.quform-theme-dark-dark, .quform-theme-dark-rounded').length) {
            images = images.concat(['/template_b/quform/themes/dark/images/button-active-bg-rep.png', '/template_b/quform/themes/dark/images/close.png', '/template_b/quform/themes/dark/images/input-active-bg-rep.png', '/template_b/quform/themes/dark/images/loading.gif']);
        }
        if ($('.quform-theme-minimal-light').length) {
            images = images.concat(['/template_b/quform/themes/minimal/images/close-light.png']);
        }
        if ($('.quform-theme-minimal-dark').length) {
            images = images.concat(['/template_b/quform/themes/minimal/images/close-dark.png', '/template_b/quform/themes/minimal/images/loading-dark.gif']);
        }
        $.preloadImages(images);
    });
})(jQuery);
