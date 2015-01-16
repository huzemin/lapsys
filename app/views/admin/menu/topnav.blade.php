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
            <a class="navbar-brand" href="#" style="color: gold;"><i class="fa fa-coffee fa-lg"></i></i>
                <span>管理中心</span></a>
            <a class="sidenav-toggle visible-md visible-lg" href="javascript:void(0)"><i
                    class="fa fa-indent fa-lg"></i></a> <!-- fa-outdent -->
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="main-menu">
            <ul class="nav navbar-nav visible-sm visible-xs">
                <!-- <li><a href="#">Link</a></li> -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="fa fa-user"></i><span>用户管理</span><span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><i class="fa fa-users"></i><span>用户列表</span></a></li>
                        <li><a href="#"><i class="fa fa-user-md"></i><span>管理员列表</span></a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i><span>个人中心</span></a></li>
                        <li class="divider"></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="fa fa-book"></i><span>文章管理</span><span class="caret"></span></a>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-comments"></i><span>评论管理</span><span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href=""><i class="fa fa-comment-o"></i><span>文章评论</span></a></li>
                        <li><a href=""><i class="fa fa-filter"></i><span>词语过滤</span></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="fa fa-cog"></i><span>网站管理</span><span class="caret"></span></a>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-shield"></i><span>用户状态</span><span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="javascript:;"><i class="fa fa-angle-right"></i><span>上次登陆时间:<b> {{ $last_login_time }}</b></span></a>
                        </li>
                        <li>
                            <a href="javascript:;"><i class="fa fa-angle-right"></i><span>上次登陆IP: <b>{{ $last_login_ip }}</b></span></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="visible-md visible-lg"><a href="#" id="user-logo"><img src="{{resize($ulogo)}}"
                                                                                  class="img-circle"/></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $uname }}<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">個人信息</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('logout') }}">退出</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>