jQuery(document).ready(function(){
    init(jQuery);
});

function init($) {
    $('input').placeholder({isUseSpan:true,onInput:false});

    $('*[data-toggle=popover]').popover();
}