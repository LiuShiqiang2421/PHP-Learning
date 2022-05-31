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
$results = json_decode(DB::table('category')->get(), true);
$desc = DB::select('select cate_id from category order by cate_id desc limit 1;');

?>
<div class="demoTable">
{{--    <input type="text" placeholder="请输入菜品类别">--}}
{{--    <button class="layui-btn" type="button" onclick="">查询</button>--}}
    <button class="layui-btn" type="button" onclick="window.location.href='<?php echo route('admin.category.insert', ['cate_id' => $desc[0]->cate_id])?>'">新增</button>
</div>
<div class="layui-form layui-border-box layui-table-view">
    <div class="layui-table-box">
        <div class="layui-table-body layui-table-main">
            <table class="layui-table">
                <thead>
                <tr>
                    <td style="width: 80px;">编号</td>
                    <td style="width: 130px;">名称</td>
                    <td style="width: 130px;">图片</td>
                    <td style="width: 130px;">操作</td>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($results as $category) {
                ?>
                <tr style="height: 50px">
                    <td><?php echo $category["cate_id"]; ?></td>
                    <td><?php echo $category["cate_name"]; ?></td>
                    <td><img src="<?php echo $category["cate_pic"]; ?>"/></td>
                    <td>
                        <a href="{{ route('admin.category.update', ['cate_id'=> $category["cate_id"]]) }}">修改</a>
                        <a href="{{ route('admin.category.delete.control', ['cate_id'=> $category["cate_id"]]) }}" onclick="return isDel();">删除</a>
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
