<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class UpdatePointsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $user_tel = $_POST['user_tel'];
        $points = $_POST['points'];
        try {
            DB::update('update user set points = :points where user_tel = :user_tel;', ['user_tel' => $user_tel, 'points'=>$points]);
            echo true;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
