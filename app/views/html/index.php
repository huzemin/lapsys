<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <title>
        界面主题
    </title>
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
<!-- 登陆界面 -->
<div class="container">
    <div class="row">
    <div class="col-md-4 col-md-push-4 page-top">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title text-center">用户登陆</h3>
      </div>
      <div class="panel-body">
        <form class="form" role="form">
          <div class="form-group">
            <label class="sr-only" for="username">用户名</label>
            <input type="email" class="form-control" id="username" name="username" placeholder="用户名">
          </div>
          <div class="form-group">
            <label class="sr-only" for="password">Password</label>
            <input type="password" class="form-control" id="password" name="username" placeholder="密码">
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="remember">记住密码
            </label>
          </div>
          <button type="submit" class="btn btn-primary btn-block">登陆</button>
        </form>
          <div>
                <p class="p1">尚未注册账号? <a href="#">注册</a></p>
          </div>
      </div>
    </div>
    </div>
    </div>
</div>
<script type="text/javascript" src="/js/jquery.min.js"></script>
</body>
</html>