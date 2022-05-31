<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<style type="text/css">
    .box{
        margin: 0 auto;
        margin-left: 10px !important;
    }
    .insert_element{
        margin-top: 10px;
        width: 250px;
        height: 34px;
        font-size: 16px;
    }
    .btn_submit{
        width: 100px;
        margin-top: 25px;
        margin-left: 150px;
        height: 35px;
        background-color: #009688;
        color: #fff;
        text-align: center;
        font-size: 14px;
        border: none;
        border-radius: 2px;
        cursor: pointer;
    }
</style>
<!--增加界面-->
<div class="box">
    <h2>新增用户信息</h2>
    <form action="{{ route('admin.user.insert.control') }}" method="post">
        <span>用户名：&emsp;</span><input class="insert_element" type="text" name="user_name" placeholder="用户名"><br>
        <span>性别：&emsp;&emsp;</span><input style="margin-top: 10px" type="radio" name="user_sex" value="男" required>男
        <input style="margin-top: 10px" type="radio" name="user_sex" value="女">女<br>
        <span>联系电话：</span><input class="insert_element" type="text" name="user_tel" placeholder="联系电话"><br>
        <span>登录密码：</span><input class="insert_element" type="password" name="password" placeholder="登录密码"><br>
        <span>确认密码：</span><input class="insert_element" type="password" name="confirm_password" placeholder="确认密码"><br>
        <span>收货地址：</span><input class="insert_element" type="text" name="user_address" placeholder="收货地址"><br>
        <span>门牌号：&emsp;</span><input class="insert_element" type="text" name="user_detailed_address" placeholder="门牌号"><br>
        <input class="btn_submit" type="submit" value="添加">
    </form>
</div>

</body>
</html>

