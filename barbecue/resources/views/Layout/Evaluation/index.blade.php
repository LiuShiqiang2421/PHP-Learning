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
$results = json_decode(DB::table('evaluation')->get(), true);
?>
<div class="demoTable">
{{--    <input type="text" name="name" placeholder="请输入订单编号">--}}
{{--    <button class="layui-btn" type="button" onclick="location.href=''">查询</button>--}}
</div>
<div class="layui-form layui-border-box layui-table-view">
    <div class="layui-table-box">
        <div class="layui-table-body layui-table-main">
            <table class="layui-table">
                <thead>
                <tr>
                    <td style="width: 130px;">订单编号</td>
                    <td style="width: 130px;">用户名</td>
                    <td style="width: 60px;">头像</td>
                    <td style="width: 130px;">电话</td>
                    <td style="width: 130px;">订单时间</td>
                    <td style="width: 130px;">评价内容</td>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($results as $evaluation) {
                ?>
                <tr style="height: 50px">
                    <td><?php echo $evaluation["e_order_id"]; ?></td>
                    <td><?php echo $evaluation["e_order_name"]; ?></td>
                    <td><img style="width: 40px; height: 40px" src="<?php echo $evaluation["e_order_avatar"];?>"></td>
                    <td><?php echo $evaluation["e_order_tel"]; ?></td>
                    <td><?php echo $evaluation["e_order_time"]; ?></td>
                    <td><?php echo $evaluation["e_content"]; ?></td>
                </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
