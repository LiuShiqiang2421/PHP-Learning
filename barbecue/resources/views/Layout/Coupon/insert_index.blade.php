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
        width: 200px;
        height: 34px;
        font-size: 16px;
    }
    .btn_submit{
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
<!--增加界面-->
<div class="box">
    <h2>新增优惠券</h2>
    <form action="{{ route('admin.coupon.insert.control') }}" method="post" enctype="multipart/form-data">
        <span>优惠金额：</span><input class="insert_element" type="text" name="c_money" placeholder="优惠金额"><br>
        <span>所需积分：</span><input class="insert_element" type="text" name="c_points" placeholder="所需积分"><br>
        <span>上传图片：</span><input class="insert_element" type="file" name="c_img"><br>
        <input class="btn_submit" type="submit" value="添加" name="btn_submit">
    </form>
</div>
</body>
</html>

