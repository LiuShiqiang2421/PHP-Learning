<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::table('userorder')->insert([
                'order_user_name'=>$request['order_user_name'],
                'order_user_sex'=>$request['order_user_sex'],
                'order_user_tel'=>$request['order_user_tel'],
                'order_catelist'=>$request['order_catelist'],
                'order_time'=>$request['order_time'],
                'order_meal_method'=>$request['order_meal_method'],
                'order_remarks'=>$request['order_remarks'],
                'order_tableware_numbers'=>$request['order_tableware_numbers'],
                'order_coupon'=>$request['order_coupon'],
                'order_pay_price'=>$request['order_pay_price'],
                'order_table_number'=>$request['order_table_number'],
                'order_address'=>$request['order_address'],
                'order_receiving_time'=>$request['order_receiving_time'],
            ]);
            echo json_encode(['status' => '成功'], JSON_UNESCAPED_UNICODE);
        }catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $tel
     * @return \Illuminate\Http\Response
     */
    public function show($tel)
    {
        $res = DB::select('select * from userorder left join evaluation on userorder.order_id = evaluation.e_order_id where order_user_tel = :tel order by userorder.order_id desc;',
            ['tel'=>$tel]);
        echo json_encode($res,JSON_UNESCAPED_UNICODE);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
