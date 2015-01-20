jQuery(document).ready(function(){
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
    // 初始化菜单tip
    $('.sidenav a span').each(function(index, el){
        var title = $(el).text();
        var parent = $(el).parent();
        if(title.trim() != '') {
          parent.attr('data-toggle',"poshytip")
          if(parent.attr('data-no') != 'pjax')
            parent.addClass('pjaxlink');
          parent.attr('title',title);
        }
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
});