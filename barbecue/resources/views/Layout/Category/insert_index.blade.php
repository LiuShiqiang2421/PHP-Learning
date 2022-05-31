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
    <h2>新增商品类别信息</h2>
    <form action="{{ route('admin.category.insert.control') }}" method="post" enctype="multipart/form-data">
        <span>类别编号：</span><input class="insert_element" type="text" name="cate_id" readonly
                                 value="<?php echo $_GET['cate_id'] + 1;?>"><br>
        <span>类别名称：</span><input class="insert_element" type="text" name="cate_name" placeholder="类别名称"><br>
        <span>上传图片：</span><input class="insert_element" type="file" name="cate_pic"><br>
        <input class="btn_submit" type="submit" value="添加" name="btn_submit">
    </form>
</div>

</body>
</html>

