<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style type="text/css">
        .update_meal{
            margin-left: 10px !important;
        }
        .update_element{
            margin-top: 10px;
            width: 200px;
            height: 34px;
            font-size: 16px;
        }
        .selected
        {
            margin-top: 10px;
            font-size: 16px;
            width: 208px;
            height: 40px;
            margin-left: -4px;
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
if (!isset($_GET["meal_id"])) {
    exit("非法访问！");
}
$results = json_decode(DB::table('meal')->where(['meal_id' => $_GET["meal_id"]])->get(), true);
$ret = json_decode(DB::table('category')->where('cate_id', '>=', 2)->get(), true);
?>
    <h2>修改菜品信息</h2>
    <form class="update_meal" action="{{ route('admin.meal.update.control') }}" method="post" enctype="multipart/form-data">

    <span>菜品编号：</span><input class="update_element" type="text" name="meal_id" readonly="readonly"
           value="<?php echo $_GET['meal_id']; ?>"><br>

    <span>菜品名称：</span><input class="update_element" type="text" name="meal_name" placeholder="菜品名称"
           value="<?php echo $results[0]['meal_name']; ?>"><br>

    <span>类别图片：</span><img class="cate_img" src="<?php echo $results[0]['meal_pic'];?>"><br>

    <input style="display: none;" class="update_element" type="text" name="pic" value="<?php echo $results[0]['meal_pic']?>">

    <span>上传图片：</span><input class="update_element" type="file" name="meal_pic"><br>

    <span>菜品介绍：</span><input class="update_element" type="text" name="meal_info" placeholder="菜品介绍"
           value="<?php echo $results[0]['meal_info']; ?>"><br>

    <span>菜品价格：</span><input class="update_element" type="text" name="meal_price" placeholder="菜品价格"
           value="<?php echo $results[0]['meal_price']; ?>"><br>

    <span>所属种类：</span>
    <select name="meal_category" class="selected" id="selectExample">
        <?php
        foreach ($ret as $value) {
        ?>
        <option value="<?php echo $value['cate_id'];?>">
            <?php echo $value['cate_name'];?>
        </option>
        <?php
        }
        ?>
    </select><br>
    <input class="btn_submit" type="submit" value="修改">
</form>
</body>
<script type="text/javascript">
   window.onload = function () {
       var sel = document.getElementById("selectExample");
       var opts = sel.getElementsByTagName("option");
       opts[<?php echo $results[0]['meal_category'] - 2;?>].selected = true;
   }
</script>
</html>












