<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUpdatePasswordController extends Controller
{
    public function update_control(Request $request)
    {
        $old_password= $request["old_password"];
        $new_password = $request["new_password"];

        $res = json_decode(DB::table('admin')->where(['password' => $old_password])->get(), true);
        if ($res) {
           DB::table('admin')->where(['password' => $old_password])->update([
               'password' => $new_password
           ]);
            echo "<script>alert('密码已修改,请重新登录！');window.location='admin.login';</script>";
        } else {
            echo "<script>alert('密码错误！请重新输入！');window.location='barbecue';</script>";
        }
    }
}
