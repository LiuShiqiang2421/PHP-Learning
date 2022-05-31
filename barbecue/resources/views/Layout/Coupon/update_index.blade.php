<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style type="text/css">
        .update_coupon{
            margin-left: 10px !important;
        }
        .update_element{
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
        .coupon_img{
            margin-top: 10px;
            width: 20%;
            height: 20%;
        }
    </style>
</head>
<body>
<!--修改界面-->
<?php
use Illuminate\Support\Facades\DB;
if (!isset($_GET["c_id"])) {
    exit("非法访问！");
}
$results = json_decode(DB::table('coupon')->where(['c_id' => $_GET["c_id"]])->get(), true);
?>
<form class="update_coupon" action="{{ route('admin.coupon.update.control') }}" method="post" enctype="multipart/form-data">
    <h2>修改优惠券信息</h2>
    <span>优惠券编号：</span><input class="update_element" type="text" name="c_id" readonly="readonly"
                             value="<?php echo $_GET['c_id']; ?>"><br>

    <span>优惠金额：&emsp;</span><input class="update_element" type="text" name="c_money" placeholder="优惠金额"
                             value="<?php echo $results[0]['c_money']; ?>"><br>
    <span>所需积分：&emsp;</span><input class="update_element" type="text" name="c_points" placeholder="所需积分"
                             value="<?php echo $results[0]['c_points']; ?>"><br>
    <span>类别图片：&emsp;</span><img class="coupon_img" src="<?php echo $results[0]['c_img'];?>"><br>
    <input style="display: none;" class="update_element" type="text" name="pic" value="<?php echo $results[0]['c_img']?>">
    <span>上传图片：&emsp;</span><input class="update_element" type="file" name="c_img"><br>

    <input class="btn_submit" type="submit" value="修改">
</form>
</body>
</html>












