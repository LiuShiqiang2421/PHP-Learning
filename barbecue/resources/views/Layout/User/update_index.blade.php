<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style type="text/css">
        .update_category {
            margin-left: 10px !important;
        }

        .update_element {
            margin-top: 10px;
            width: 200px;
            height: 34px;
            font-size: 16px;
        }

        .btn_submit {
            width: 100px;
            margin-top: 25px;
            margin-left: 100px;
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
</head>
<body>
<!--修改界面-->
<?php
use Illuminate\Support\Facades\DB;
if (!isset($_GET["user_id"])) {
    exit("非法访问！");
}
$results = json_decode(DB::table('user')->where(['user_id' => $_GET["user_id"]])->get(), true);
?>
<form class="update_category" action="{{ route('admin.user.update.control') }}" method="post"
      enctype="multipart/form-data">
    <h2>修改用户信息</h2>
    <span>用户编号：</span><input class="update_element" type="text" name="user_id" readonly="readonly" value="<?php echo $_GET['user_id']; ?>"><br>
    <span>用户名：&emsp;</span><input class="update_element" type="text" name="user_name" placeholder="用户名" value="<?php echo $results[0]['user_name']; ?>"><br>
    <span>性别：&emsp;&emsp;</span><input style="margin-top: 10px" type="radio" name="user_sex" value="男" <?php echo $results[0]['user_sex'] == '男' ? 'checked' : '';?>>男
    <input style="margin-top: 10px" type="radio" name="user_sex" value="女" <?php echo $results[0]['user_sex'] == '女' ? 'checked' : '';?>>女<br>
    <span>头像：&emsp;&emsp;</span><img style="width: 40px; height: 40px; margin-top: 10px" src="<?php echo $results[0]['avatar']; ?>"><br>
    <input style="display: none;" class="update_element" type="text" name="pic" value="<?php echo $results[0]['avatar']?>">
    <span>上传图片：</span><input class="update_element" type="file" name="avatar"><br>
    <span>联系电话：</span><input class="update_element" type="text" name="user_tel" placeholder="联系电话" value="<?php echo $results[0]['user_tel']; ?>"><br>
    <span>登录密码：</span><input class="update_element" type="text" name="password" placeholder="登录密码" value="<?php echo $results[0]['password']; ?>"><br>
    <span>积分：&emsp;&emsp;</span><input class="update_element" type="text" name="points" placeholder="积分" value="<?php echo $results[0]['points']; ?>"><br>
    <span>优惠券：&emsp;</span><input class="update_element" type="text" name="coupon" placeholder="优惠券" value="<?php echo $results[0]['coupon']; ?>"><br>
    <span>收货地址：</span><input class="update_element" type="text" name="user_address" placeholder="收货地址" value="<?php echo $results[0]['user_address']; ?>"><br>
    <span>门牌号：&emsp;</span><input class="update_element" type="text" name="user_detailed_address" placeholder="门牌号" value="<?php echo $results[0]['user_detailed_address']; ?>"><br>

    <input class="btn_submit" type="submit" value="修改">
</form>
</body>
</html>












