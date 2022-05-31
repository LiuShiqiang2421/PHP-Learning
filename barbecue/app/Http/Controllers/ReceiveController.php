<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReceiveController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $tel = $_POST['tel'];
        try {
            DB::update('update user set is_receive = 1, coupon = 50.00 where user_tel = :user_tel;', ['user_tel' => $tel]);
            echo true;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }
}
