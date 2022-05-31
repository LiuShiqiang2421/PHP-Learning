<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>管理员系统</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

    <style>
        .logout :hover {
            background-color: #494e53;
        }
        .logout i {
            margin-left: 5px;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item" style="margin-right: 0">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <i class="fa fa-chart-area" style="margin-left: 19px"></i>
            <span class="brand-text font-weight-bold">管理员系统</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{\Illuminate\Support\Facades\URL::asset('libs/img/管理员.png')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <?php
                    session_start();
                    if (isset($_SESSION["account"])) {
                    ?>
                    <span style="color: #c2c7d0"><?php echo $_SESSION["account"]; ?></span>
                    <?php
                    } else {
                    ?>
                    <a href="{{route('admin.login')}}">请登录</a>
                    <?php
                    exit("");
                    }
                    ?>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <!--菜品类别管理-->
                    <li class="nav-item">
                        <a href="{{ route('admin.category.index') }}" class="nav-link ">
                            <i class="nav-icon fa fa-chart-pie"></i>
                            <p>菜品类别管理</p>
                        </a>
                    </li>
                    <!--菜品管理-->
                    <li class="nav-item">
                        <a href="{{ route('admin.meal.index') }}" class="nav-link ">
                            <i class="nav-icon fa fa-chart-bar"></i>
                            <p>菜品管理</p>
                        </a>
                    </li>
                    <!--用户管理-->
                    <li class="nav-item">
                        <a href="{{ route('admin.user.index') }}" class="nav-link ">
                            <i class="nav-icon fa fa-users"></i>
                            <p>用户管理</p>
                        </a>
                    </li>
                    <!--订单管理-->
                    <li class="nav-item">
                        <a href="{{ route('admin.order.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-list-alt"></i>
                            <p>顾客订单</p>
                        </a>
                    </li>
                    <!--订单评价-->
                    <li class="nav-item">
                        <a href="{{ route('admin.evaluation.index') }}" class="nav-link">
                            <i class="nav-icon fa fa-comment-alt"></i>
                            <p>订单评价</p>
                        </a>
                    </li>
                    <!--优惠券管理-->
                    <li class="nav-item">
                        <a href="{{ route('admin.coupon.index') }}" class="nav-link ">
                            <i class="nav-icon fa fa-ticket-alt" aria-hidden="true"></i>
                            <p>优惠券管理</p>
                        </a>
                    </li>
                    <!--修改密码-->
{{--                    <li class="nav-item">--}}
{{--                        <a style="cursor: pointer" class="nav-link " data-toggle="modal" data-target="#myModal">--}}
{{--                            <i class="nav-icon fa fa-key"></i>--}}
{{--                            <p>修改密码</p>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <!--退出系统-->
                    <li class="logout">
                        <a href="{{route('admin.logout')}}" class="nav-link" onclick="return isDel();">
                            <i class="nav-icon fa fa-sign-out-alt"></i>
                            <p style="margin-left: 8px;">退出系统</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- 模态框（Modal） -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">修改密码</h4>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.update.password.control') }}" name="update_password">
                        请输入原密码进行确认：<input  type="password" class="form-control" name="old_password"/>
                        请输入新密码：<input type="password" class="form-control" name="new_password"/>
                        请再次输入新密码：<input  type="password" class="form-control" name="new_password_again"/>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-default"
                            data-dismiss="modal">关闭
                    </button>
                    <input type="submit" class="btn btn-primary" value="确定" onclick="return isRight();"/>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">
        <div class="nav navbar navbar-expand navbar-white navbar-light border-bottom p-0">
            <ul class="navbar-nav overflow-hidden" role="tablist"></ul>
            <a class="nav-link bg-light" href="#" data-widget="iframe-fullscreen"><i class="fas fa-expand"></i></a>
        </div>
        <div class="tab-content">
            <div class="tab-empty">
                <h2 class="display-4">点击侧边栏查看信息</h2>
            </div>
            <div class="tab-loading">
                <div>
                    <h2 class="display-4">正在加载... <i class="fa fa-sync fa-spin"></i></h2>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2018-2022 <a href="#">Administrator system</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
<script type="text/javascript">
    function isDel() {
        var isDel = confirm("确定要退出吗？");
        return isDel;
    }
    function isRight() {
        const old_password = update_password.old_password.value;
        const new_password = update_password.new_password.value;
        const new_password_again = update_password.new_password_again.value;
        if(old_password === ""){
            alert("密码为空！请输入！");
            update_password.old_password.focus();
            return false;
        }
        if(new_password === ""){
            alert("请输入新密码：");
            update_password.new_password.focus();
            return false;
        }
        if(new_password_again === ""){
            alert("请再次输入新密码：");
            update_password.new_password_again.focus();
            return false;
        }
        if(new_password !== new_password_again){
            alert("两次密码不一致");
        }else{
            window.location.href="{{ route('admin.update.password.control', '此处需要传入参数old_password和new_password') }}";
        }
    }
</script>
</html>
