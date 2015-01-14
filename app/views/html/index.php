<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <title>
        界面主题
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-select.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/bootstrap-datetimepicker.min.css" />
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
            <div class="input-group">
              <span class="input-group-addon">
                <i class="glyphicon glyphicon-user"></i>
              </span>
              <input type="email" class="form-control" id="username" name="username" placeholder="用户名">
            </div>
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
          <div class="form-group">
            <select name='select[]' class="selectpicker show-menu-arrow" multiple data-style="btn-primary" data-live-search="true">
              <option>Mustard</option>
              <option>Ketchup</option>
              <option>Barbecue</option>
            </select>
          </div>
          <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
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
</div>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/jquery.bootstrap-growl.min.js"></script>
<script type="text/javascript" src="/js/bootstrap-select/bootstrap-select.js"></script>
<script type="text/javascript" src="/js/bootstrap-select/i18n/defaults-zh_CN.js"></script>
<script type="text/javascript" src="/js/moment.js"></script>
<script type="text/javascript" src="/js/locale/zh-cn.js"></script>
<script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/js/common/funcs.js"></script>
<script type="text/javascript" src="/js/common/run.js"></script>
<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({language:'zh-cn'});
            });
        </script>
</body>
</html>