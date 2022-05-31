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
    .selected
    {
        margin-top: 10px;
        font-size: 16px;
        width: 208px;
        height: 40px;
        margin-left: -4px;
    }
</style>
<?php
use Illuminate\Support\Facades\DB;
$ret = json_decode(DB::table('category')->where('cate_id', '>=', 2)->get(), true);
?>

<!--增加界面-->
<div class="box">
    <h2>新增菜品信息</h2>
    <form action="{{ route('admin.meal.insert.control') }}" method="post" enctype="multipart/form-data">
        <span>菜品名称：</span><input class="insert_element" type="text" name="meal_name" placeholder="菜品名称"><br>
        <span>上传图片：</span><input class="insert_element" type="file" name="meal_pic"><br>
        <span>菜品介绍：</span><input class="insert_element" type="text" name="meal_info" placeholder="菜品介绍"><br>
        <span>菜品价格：</span><input class="insert_element" type="text" name="meal_price" placeholder="菜品价格"><br>
        <span>所属种类：</span>
        <select name="meal_category" class="selected">
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
        <input class="btn_submit" type="submit" value="添加" name="btn_submit">
    </form>
</div>

</body>
</html>


