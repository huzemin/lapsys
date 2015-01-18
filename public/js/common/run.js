jQuery(document).ready(function(){
    init(jQuery);
    if(typeof NProgress == 'object') {
        NProgress.configure({ parent: '#pjax' });
    }

    $(document).on('click', 'a[data-pjax=delete]', function(event){
        event.preventDefault();
        var parent = $(this).closest('tr');
        if(parent) {
            parent.addClass('deleting');
        }
        var that = $(this);
        var url = $(this).attr('href');
        var msg = typeof $(this).attr('data-msg') != 'undefined' ?  $(this).attr('msg') : '你确认要删除此条数据么？';
        bootbox.confirm(msg,function(result){
            if(result) {
                if($.support.pjax) {
                    $.pjax({url: url, container: '#pjax',fragment: "#pjax",timeout: 10000,scrollTo:0})
                } else {
                    window.location.href= url;
                }
            } else {
                if(parent) {
                    parent.removeClass('deleting');
                }
            }
        });
    });

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