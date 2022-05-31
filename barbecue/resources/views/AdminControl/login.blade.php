<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title> - 管理员登录</title>
    <link href="{{\Illuminate\Support\Facades\URL::asset('libs/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{\Illuminate\Support\Facades\URL::asset('libs/css/font-awesome.css?v=4.4.0')}}" rel="stylesheet">
    <link href="{{\Illuminate\Support\Facades\URL::asset('libs/css/animate.css')}}" rel="stylesheet">
    <link href="{{\Illuminate\Support\Facades\URL::asset('libs/css/style.css')}}" rel="stylesheet">
    <link href="{{\Illuminate\Support\Facades\URL::asset('libs/css/login.css')}}" rel="stylesheet">
</head>
<body class="signin">
<div class="signinpanel">
    <div class="row">
        <div class="col-sm-12">
            <form method="post" action="{{route('admin.login.control')}}">
                <h4 class="no-margins">登录：</h4>
                <p class="m-t-md">登录管理员系统</p>
                <input type="text" name="account" class="form-control uname" placeholder="用户名"/>
                <input type="password" name="password" class="form-control pword m-b" placeholder="密码"/>
                <input class="btn btn-success btn-block" type="submit" name="btn_sub" value="登录"
                       style="width: 100%;background-color: #27c24c;border: none;height: 30px;color: white">
            </form>
        </div>
    </div>
    <div class="signup-footer">
        <div class="pull-left">
            &copy;Administrator system
        </div>
    </div>
</div>
</body>
</html>
