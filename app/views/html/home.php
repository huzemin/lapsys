<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <title>
        后台界面
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/common.css" />
    <link rel="stylesheet" type="text/css" href="/css/poshytip/tip-twitter/tip-twitter.css" />
    <link rel="stylesheet" type="text/css" href="/css/layouts/adminstyle.css" />
    <!--[if lt IE 9]>
      <script src="/js/html5shiv.min.js"></script>
      <script src="/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="#topnav">
  <nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="col-md-2 navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#" style="color: gold;"><i class="fa fa-coffee fa-lg"></i></i><span>管理中心</span></a>
        <a class="sidenav-toggle visible-md visible-lg" href="javascript:void(0)"><i class="fa fa-indent fa-lg"></i></a> <!-- fa-outdent -->
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="main-menu">
        <ul class="nav navbar-nav visible-sm visible-xs">
          <!-- <li><a href="#">Link</a></li> -->
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><span>用户管理</span><span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#"><i class="fa fa-users"></i><span>用户列表</span></a></li>
              <li><a href="#"><i class="fa fa-user-md"></i><span>管理员列表</span></a></li>
              <li class="divider"></li>
              <li><a href="#"><i class="fa fa-credit-card"></i><span>个人中心</span></a></li>
              <li class="divider"></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-book"></i><span>文章管理</span><span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li>
                  <a href=""><i class="fa fa-file-text"></i><span>文章列表</span></a>
              </li>
              <li>
                  <a href=""><i class="fa fa-eye"></i><span>待审文章</span></a>
              </li>
              <li>
                  <a href=""><i class="fa fa-file-text"></i><span>原创佳品</span></a>
              </li>
              <li>
                  <a href=""><i class="fa fa-tags"></i><span>标签管理</span></a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-comments"></i><span>评论管理</span><span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href=""><i class="fa fa-comment-o"></i><span>文章评论</span></a></li>
              <li><a href=""><i class="fa fa-filter"></i><span>词语过滤</span></a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i><span>网站管理</span><span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a href=""><i class="fa fa-angle-right"></i><span>注册/登陆</span></a>
                </li>
                <li>
                    <a href=""><i class="fa fa-wrench"></i><span>网站设置</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart"></i><span>数据分析</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-tachometer"></i></i><span>在线监控</span></a>
                </li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav">
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shield"></i><span>用户状态</span><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                  <li>
                      <a href=""><i class="fa fa-angle-right"></i><span>上次登陆时间</span></a>
                  </li>
                  <li>
                      <a href=""><i class="fa fa-angle-right"></i><span>上次登陆IP</span></a>
                  </li>
              </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="visible-md visible-lg"><a href="#" id="user-logo"><img src="images/userlogo.jpg" class="img-circle"/></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">胡泽民<span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">個人信息</a></li>
              <li class="divider"></li>
              <li><a href="#">退出</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</div>
<div class="container-fluid layout">
    <div class="row layout">
        <div class="col-md-2 side lside visible-md visible-lg">
            <div class="side-bar">
              <ul class="sidenav menu-left-nest">
                  <li>
                      <a href="#">
                          <i class="fa fa-user"></i><span>用户管理</span>
                      </a>
                      <ul>
                          <li>
                              <a href=""><i class="fa fa-users"></i><span>用户列表</span></a>
                          </li>
                          <li>
                              <a href=""><i class="fa fa-user-md"></i><span>管理员列表</span></a>
                          </li>
                          <li>
                              <a href=""><i class="fa fa-credit-card"></i><span>个人中心</span></a>
                          </li>
                      </ul>
                  </li>
              </ul>
               <ul class="sidenav menu-left-nest">
                  <li>
                      <a href="#">
                          <i class="fa fa-book"></i><span>文章管理</span>
                      </a>
                      <ul>
                          <li>
                              <a href=""><i class="fa fa-file-text"></i><span>文章列表</span></a>
                          </li>
                          <li>
                              <a href=""><i class="fa fa-eye"></i><span>待审文章</span></a>
                          </li>
                          <li>
                              <a href=""><i class="fa fa-file-text"></i><span>原创佳品</span></a>
                          </li>
                          <li>
                              <a href=""><i class="fa fa-tags"></i><span>标签管理</span></a>
                          </li>
                      </ul>
                  </li>
              </ul>
              <ul class="sidenav menu-left-nest">
                  <li>
                      <a href="#">
                         <i class="fa fa-comments"></i><span>评论管理</span>
                      </a>
                      <ul>
                          <li>
                              <a href=""><i class="fa fa-comment-o"></i><span>文章评论</span></a>
                          </li>
                          <li>
                              <a href=""><i class="fa fa-filter"></i><span>词语过滤</span></a>
                          </li>
                      </ul>
                  </li>
              </ul>
              <ul class="sidenav menu-left-nest">
                  <li>
                      <a href="#">
                          <i class="fa fa-cog"></i><span>网站管理</span>
                      </a>
                      <ul>
                          <li>
                              <a href=""><span>注册/登陆</span></a>
                          </li>
                          <li>
                              <a href=""><i class="fa fa-wrench"></i><span>网站设置</span></a>
                          </li>
                          <li>
                              <a href="#"><i class="fa fa-bar-chart"></i><span>数据分析</span></a>
                          </li>
                          <li>
                              <a href="#"><i class="fa fa-tachometer"></i></i><span>在线监控</span></a>
                          </li>
                      </ul>
                  </li>
              </ul>
            </div>
        </div>
        <div class="col-md-10 main">
         <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="#">Library</a></li>
              <li class="active">Data</li>
          </ol>
          <div class="container-fluid">
            <div class="panel panel-default" >
                <div class="panel-heading">Panel heading without title</div>
                <div class="panel-body">
                  <span data-toggle="rptip" title="rcptipPanel content">rcptipPanel content</span>
                  <span data-toggle="tptip" title="rcptipPanel content">rcptipPanel content</span>
                   <span data-toggle="bptip" title="rcptipPanel content">rcptipPanel content</span>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-2 side rside">
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery.enplaceholder.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/jquery.poshytip.min.js"></script>
<script type="text/javascript" src="/js/jquery.bootstrap-growl.min.js"></script>
<script type="text/javascript" src="/js/bootstrap-select/bootstrap-select.js"></script>
<script type="text/javascript" src="/js/bootstrap-select/i18n/defaults-zh_CN.js"></script>
<script type="text/javascript" src="/js/common/run.js"></script>
<script type="text/javascript">
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
    })
});
</script>
</body>
</html>