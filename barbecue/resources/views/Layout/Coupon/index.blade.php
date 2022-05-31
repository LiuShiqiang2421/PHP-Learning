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
$results = json_decode(DB::table('coupon')->get(), true);
?>
<div class="demoTable">
{{--    <input type="text" name="name" placeholder="请输入优惠券金额">--}}
{{--    <button class="layui-btn" type="button" onclick="location.href=''">查询</button>--}}
    <button class="layui-btn" type="button" onclick="window.location.href='<?php echo route('admin.coupon.insert')?>'">新增</button>
</div>
<div class="layui-form layui-border-box layui-table-view">
    <div class="layui-table-box">
        <div class="layui-table-body layui-table-main">
            <table class="layui-table">
                <thead>
                <tr>
                    <td style="width: 80px;">编号</td>
                    <td style="width: 60px;">图片</td>
                    <td style="width: 110px;">优惠金额</td>
                    <td style="width: 110px;">所需积分</td>
                    <td style="width: 130px;">操作</td>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($results as $coupon) {
                ?>
                <tr style="height: 50px">
                    <td><?php echo $coupon["c_id"]; ?></td>
                    <td><img style="width: 45px; height: 35px" src="<?php echo $coupon["c_img"]; ?>"/></td>
                    <td><?php echo $coupon["c_money"]; ?></td>
                    <td><?php echo $coupon["c_points"]; ?></td>
                    <td>
                        <a href="{{ route('admin.coupon.update', ['c_id'=> $coupon["c_id"]]) }}">修改</a>
                        <a href="{{ route('admin.coupon.delete.control', ['c_id'=> $coupon["c_id"]]) }}" onclick="return isDel();">删除</a>
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
