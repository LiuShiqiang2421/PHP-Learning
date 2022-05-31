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
$results = json_decode(DB::table('userorder')->orderBy('order_id', 'desc')->get(), true);
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
                    <td style="width: 80px;">编号</td>
                    <td style="width: 130px;">用户名</td>
                    <td style="width: 130px;">性别</td>
                    <td style="width: 130px;">联系电话</td>
                    <td style="width: 130px;">订单信息</td>
                    <td style="width: 130px;">订单时间</td>
                    <td style="width: 130px;">取餐方式</td>
                    <td style="width: 130px;">桌号</td>
                    <td style="width: 130px;">送达时间</td>
                    <td style="width: 130px;">送达地址</td>
                    <td style="width: 130px;">餐具数量</td>
                    <td style="width: 130px;">支付金额</td>
                    <td style="width: 130px;">备注</td>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($results as $order) {
                ?>
                <tr style="height: 50px">
                    <td><?php echo $order["order_id"]; ?></td>
                    <td><?php echo $order["order_user_name"]; ?></td>
                    <td><?php echo $order["order_user_sex"]; ?></td>
                    <td><?php echo $order["order_user_tel"]; ?></td>
                    <td><?php foreach (json_decode($order["order_catelist"], true) as $order_item) {
                        echo $order_item['meal_name'].' x '.$order_item['meal_purchase_quantity'].'<br>';
                        }?></td>
                    <td><?php echo $order["order_time"]; ?></td>
                    <td><?php echo $order["order_meal_method"] == 'take-away' ? '外卖' : '店内就餐'; ?></td>
                    <td><?php echo $order["order_table_number"]; ?></td>
                    <td><?php echo $order["order_receiving_time"]; ?></td>
                    <td><?php echo $order["order_address"]; ?></td>
                    <td><?php echo $order["order_tableware_numbers"]; ?></td>
                    <td><?php echo '￥'.$order["order_pay_price"]; ?></td>
                    <td><?php echo $order["order_remarks"]; ?></td>
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
