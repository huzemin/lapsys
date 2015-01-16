 $(function(){
    $('.sidenav > li > a').click(function(e){
        e.preventDefault();
        $('.sidenav > li > a').removeClass('active');
        var sul = $(this).siblings('ul');
        $(this).addClass('active');
        if(sul.length > 0 && !sul.is(":visible")) {
            $('.sidenav > li > a').siblings('ul').slideUp();
            sul.slideDown();
        } else{
            $('.sidenav > li > a').siblings('ul').slideUp();
        }
    });
    var poshytip_className = "tip-twitter";
    // 初始化菜单tip
    $('.sidenav a span').each(function(index, el){
        var title = $(el).text();
        if(title.trim() != '') {
          $(el).parent().attr('data-toggle',"poshytip");
          $(el).parent().attr('title',title);
        }
    });
    $('*[data-toggle=poshytip],*[data-toggle=lptip]').poshytip({
        className: poshytip_className,
        showTimeout: 100,
        alignTo: 'target',
        alignX: 'right',
        alignY: 'center',
        offsetX: 10,
        allowTipHover: false,
        fade: true,
        slide: true
    });
        $('*[data-toggle=tptip]').poshytip({
        className: poshytip_className,
        showTimeout: 1,
        alignTo: 'target',
        alignX: 'center',
        offsetY: 2,
        allowTipHover: false,
        fade: true,
        slide: true
    });
     $('*[data-toggle=bptip]').poshytip({
        className: poshytip_className,
        showTimeout: 1,
        alignTo: 'target',
        alignX: 'center',
        alignY: 'bottom',
        offsetY: 2,
        allowTipHover: false,
        fade: true,
        slide: true
    });

     $('*[data-toggle=rptip]').poshytip({
        className: poshytip_className,
        showTimeout: 1,
        alignTo: 'target',
        alignX: 'left',
        alignY: 'center',
        offsetX: 10,
        allowTipHover: false,
        fade: true,
        slide: true
    });
    $('.sidenav-toggle').click(function(e){
        e.preventDefault();
        var flag = $(this).attr('data-flag');
        if(typeof flag == 'undefined') {
            $(this).find('i').removeClass('fa-indent').addClass('fa-outdent');
            $('.lside').removeClass('col-md-2').addClass('col-md-1');
            $('.main').removeClass('col-md-10').addClass('col-md-11');
            $(this).attr('data-flag',false)
        } else {
          console.log('hello');
            $(this).find('i').removeClass('fa-outdent').addClass('fa-indent');
            $('.lside').removeClass('col-md-1').addClass('col-md-2');
            $('.main').removeClass('col-md-11').addClass('col-md-10');
            $(this).removeAttr('data-flag');
        }
    });
    $('form').Validform({
        label:"label",
        showAllError:true,
        tiptype:5
    });
});