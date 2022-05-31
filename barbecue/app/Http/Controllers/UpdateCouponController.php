<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateCouponController extends Controller
{
    /**
     * Handle the incoming request.
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $user_tel = $_POST['user_tel'];
        $coupon = $_POST['coupon'];
        try {
            DB::update('update user set coupon = :coupon where user_tel = :user_tel;', ['user_tel' => $user_tel, 'coupon'=>$coupon]);
            echo true;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
