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
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><i class="fa fa-stumbleupon fa-lg"></i><span>管理中心</span></a>
        <a class="sidenav-toggle visible-md visible-lg" href="javascript:void(0)"><i class="fa fa-indent fa-lg"></i></a> <!-- fa-outdent -->
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav visible-sm visible-xs">
          <li class="active"><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li class="divider"></li>
              <li><a href="#">Separated link</a></li>
              <li class="divider"></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Link</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li class="divider"></li>
              <li><a href="#">Separated link</a></li>
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
                          <i class="fa fa-user"></i><span  data-toggle="tooltip" data-placement="right" title="Blog">Blog App asdfsadfsadf</span>
                      </a>
                      <ul>
                          <li>
                              <a href=""><span>Blog List</span></a>
                          </li>
                          <li>
                              <a href=""><span>Blog Details</span></a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="">
                          <span>Social</span>
                      </a>
                  </li>
                  <li>
                      <a href="">
                          <span>Media</span>

                      </a>
                  </li>
              </ul>
               <ul class="sidenav menu-left-nest">
                  <li>
                      <a href="#">
                          <span>Blog App</span>
                      </a>
                      <ul>
                          <li>
                              <a href=""><span>Blog List</span></a>
                          </li>
                          <li>
                              <a href=""><span>Blog Details</span></a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="">
                          <span>Social</span>
                      </a>
                  </li>
                  <li>
                      <a href="">
                          <span>Media</span>

                      </a>
                  </li>
              </ul>
               <ul class="sidenav menu-left-nest">
                  <li>
                      <a href="#">
                          <span>Blog App</span>
                      </a>
                      <ul>
                          <li>
                              <a href=""><span>Blog List</span></a>
                          </li>
                          <li>
                              <a href=""><span>Blog Details</span></a>
                          </li>
                      </ul>
                  </li>
                  <li>
                      <a href="">
                          <span>Social</span>
                      </a>
                  </li>
                  <li>
                      <a href="">
                          <span>Media</span>

                      </a>
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

          <div class="panel panel-default" >
          <div class="panel-heading">Panel heading without title</div>
          <div class="panel-body">
            Panel content
          </div>
        </div>

        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Panel title</h3>
          </div>
          <div class="panel-body">
            Panel content
          </div>
        </div>
        </div>
        <div class="col-md-2 side rside">
          rside
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery.enplaceholder.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
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
    $('*[data-toggle=tooltip]').tooltip();
    $('.sidenav-toggle').click(function(e){
        e.preventDefault();
        var flag = $(this).attr('data-flag');
        console.log(flag);
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