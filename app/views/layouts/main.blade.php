<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <title>@if(!empty($pagetitle)) {{$pagetitle}} @else Project @endif</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/common.css" />
    <!--[if lt IE 9]>
      <script src="/js/html5shiv.min.js"></script>
      <script src="/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    @yield('content')
    <script type="text/javascript" src="/js/jquery.min.js"></script>
</body>
</html>