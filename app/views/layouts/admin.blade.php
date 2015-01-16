<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <title>@if(!empty($pagetitle)) {{$pagetitle}} @else Project Manager System @endif</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-select.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/poshytip/tip-twitter/tip-twitter.css"/>
    <link rel="stylesheet" href="{{ asset('css/validform.css') }}" />
    @yield('styleload','')
    <link rel="stylesheet" type="text/css" href="/css/layouts/adminstyle.css"/>
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.min.js"></script>
    <script src="/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="#topnav">
    @include('admin.menu.topnav')
</div>
<div class="container-fluid layout">
    <div class="row layout">
        <div class="col-md-2 side lside visible-md visible-lg">
            @include('admin.menu.sidenav')
        </div>
        <div class="col-md-10 main">
           @yield('content','')
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
<script type="text/javascript" src="{{ asset('js/Validform.min.js') }}"></script>
<script type="text/javascript" src="/js/common/admin.js"></script>
<script type="text/javascript" src="/js/common/run.js"></script>
@yield('jsload','')
</body>
</html>

