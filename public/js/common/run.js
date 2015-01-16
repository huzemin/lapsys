jQuery(document).ready(function(){
    init(jQuery);
    NProgress.configure({ parent: '#pjax' });
    if ($.support.pjax) {
       $(document).pjax('.pjaxlink, .pagination li a, [data-pjax] a', '#pjax', {
            fragment: "#pjax",
            timeout: 10000,
            scrollTo:0
        });
       $(document).on('submit', 'form[data-pjax]', function(event) {
          $.pjax.submit(event, '#pjax', {
                fragment: "#pjax",
                timeout: 10000,
                scrollTo:0
          });
        });
        NProgress.configure({ parent: '#pjax' });
        $(document).on('pjax:start',   function() { NProgress.start(); });
        $(document).on('pjax:popstate',   function() { NProgress.inc(0.2);; });
        $(document).on('pjax:send',   function() { NProgress.inc(0.3);; });
        $(document).on('pjax:success',   function() { NProgress.inc(0.4);; });
        $(document).on('pjax:complete',   function() { NProgress.inc(0.4); });
        $(document).on('pjax:timeout',  function(event) { NProgress.set(0.9); NProgress.done();event.preventDefault()});
        $(document).on('pjax:end', function() { NProgress.inc(0.3); NProgress.done();init(jQuery);});
    }
});

function init($) {
    if(typeof console != 'undefined') {
        console.log('initialize...');
    }
    $('.selectpicker').selectpicker();
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        $('.selectpicker').selectpicker('mobile');
    }
    //通过value模拟placeholder
    //$('input').placeholder();
    //通过插入元素模拟placeholder
    $('input').placeholder({isUseSpan:true,onInput:false});
    if(typeof console != 'undefined') {
        console.log('Finish...');
    }
}