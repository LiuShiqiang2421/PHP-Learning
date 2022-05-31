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
$results = json_decode(DB::table('user')->get(), true);
?>
<div class="demoTable">
{{--    <input type="text" name="name" placeholder="请输入菜品名称">--}}
{{--    <button class="layui-btn" type="button" onclick="location.href=''">查询</button>--}}
    <button class="layui-btn" type="button" onclick="window.location.href='<?php echo route('admin.user.insert')?>'">新增</button>

</div>
<div class="layui-form layui-border-box layui-table-view">
    <div class="layui-table-box">
        <div class="layui-table-body layui-table-main">
            <table class="layui-table">
                <thead>
                <tr>
                    <td style="width: 80px;">用户编号</td>
                    <td style="width: 130px;">用户名</td>
                    <td style="width: 130px;">性别</td>
                    <td style="width: 60px;">头像</td>
                    <td style="width: 130px;">联系电话</td>
                    <td style="width: 150px;">积分</td>
                    <td style="width: 130px;">优惠券</td>
                    <td style="width: 130px;">地址</td>
                    <td style="width: 130px;">操作</td>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($results as $user) {
                ?>
                <tr>
                    <td style="height: 50px"><?php echo $user["user_id"]; ?></td>
                    <td style="height: 50px"><?php echo $user["user_name"]; ?></td>
                    <td style="height: 50px"><?php echo $user["user_sex"]; ?></td>
                    <td style="height: 50px"><img style="width: 40px; height: 40px" src="<?php echo $user["avatar"]; ?>"></td>
                    <td style="height: 50px"><?php echo $user["user_tel"]; ?></td>
                    <td style="height: 50px"><?php echo $user['points']?></td>
                    <td style="height: 50px"><?php echo $user['coupon']?></td>
                    <td style="height: 50px"><?php echo $user['user_address'].$user['user_detailed_address']?></td>
                    <td style="height: 50px">
                        <a href="{{ route('admin.user.update', ['user_id'=> $user["user_id"]]) }}">修改</a>
                        <a href="{{ route('admin.user.delete.control', ['user_id'=> $user["user_id"]]) }}" onclick="return isDel();">删除</a>
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
