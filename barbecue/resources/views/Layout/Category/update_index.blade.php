<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style type="text/css">
        .update_category{
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
        .cate_img{
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
if (!isset($_GET["cate_id"])) {
    exit("非法访问！");
}
$results = json_decode(DB::table('category')->where(['cate_id' => $_GET["cate_id"]])->get(), true);
?>
<form class="update_category" action="{{ route('admin.category.update.control') }}" method="post" enctype="multipart/form-data">
    <h2>修改菜品类别信息</h2>
    <span>类别编号：</span><input class="update_element" type="text" name="cate_id" readonly="readonly"
           value="<?php echo $_GET['cate_id']; ?>"><br>

    <span>类别名称：</span><input class="update_element" type="text" name="cate_name" placeholder="类别名称"
           value="<?php echo $results[0]['cate_name']; ?>"><br>
    <span>类别图片：</span><img class="cate_img" src="<?php echo $results[0]['cate_pic'];?>"><br>
    <input style="display: none;" class="update_element" type="text" name="pic" value="<?php echo $results[0]['cate_pic']?>">
    <span>上传图片：</span><input class="update_element" type="file" name="cate_pic"><br>

    <input class="btn_submit" type="submit" value="修改">
</form>
</body>
</html>












