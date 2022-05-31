<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="{{\Illuminate\Support\Facades\URL::asset('libs/layui/css/layui.css')}}" rel="stylesheet">
    <script type="text/javascript"
            src="{{\Illuminate\Support\Facades\URL::asset('libs/jquery/jquery-1.11.1.js')}}"></script>
    <script type="text/javascript" src="{{\Illuminate\Support\Facades\URL::asset('libs/layui/layui.all.js')}}"></script>
    <script type="text/javascript" src="{{\Illuminate\Support\Facades\URL::asset('libs/js/util.js')}}"></script>
    <script type="text/javascript" src="{{\Illuminate\Support\Facades\URL::asset('libs/js/mylayer.js')}}"></script>
    <link href="{{\Illuminate\Support\Facades\URL::asset('css/css.css')}}" rel="stylesheet">
    <style type="text/css">
        .layui-table {
            margin-left: 20px !important;
        }

        td {
            text-align: center;
        }
    </style>
    <title></title>

</head>
<body class="hold-transition sidebar-mini">
<?php
use Illuminate\Support\Facades\DB;
$results = json_decode(DB::table('meal')->get(), true);
?>
<div class="demoTable">
{{--    <input type="text" name="name" placeholder="请输入菜品名称">--}}
{{--    <button class="layui-btn" type="button" onclick="location.href=''">查询</button>--}}
    <button class="layui-btn" type="button" onclick="window.location.href='<?php echo route('admin.meal.insert')?>'">新增</button>
</div>
<div class="layui-form layui-border-box layui-table-view">
    <div class="layui-table-box">
        <div class="layui-table-body layui-table-main">
            <table class="layui-table">
                <thead>
                <tr>
                    <td style="width: 80px;">菜品编号</td>
                    <td style="width: 130px;">菜品名称</td>
                    <td>菜品图片</td>
                    <td style="width: 150px;">菜品介绍</td>
                    <td style="width: 130px;">菜品价格</td>
                    <td style="width: 130px;">所属类别</td>
                    <td style="width: 130px;">操作</td>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($results as $meal) {
                $results = json_decode(DB::table('category')->where('cate_id', $meal['meal_category'])->select(['cate_name'])->get(), true);
                ?>
                <tr style="height: 80px">
                    <td><?php echo $meal["meal_id"]; ?></td>
                    <td><?php echo $meal["meal_name"]; ?></td>
                    <td><img src="<?php echo $meal["meal_pic"]; ?>"/></td>
                    <td><?php echo $meal["meal_info"]; ?></td>
                    <td><?php echo $meal["meal_price"]; ?></td>
                    <td><?php echo $results[0]['cate_name']; ?></td>
                    <td>
                        <a href="{{ route('admin.meal.update', ['meal_id'=> $meal["meal_id"]]) }}">修改</a>
                        <a href="{{ route('admin.meal.delete.control', ['meal_id'=> $meal["meal_id"]]) }}" onclick="return isDel();">删除</a>
                    </td>
                </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    function isDel() {
        return confirm("确定要删除吗？");
    }
</script>
</body>
</html>
