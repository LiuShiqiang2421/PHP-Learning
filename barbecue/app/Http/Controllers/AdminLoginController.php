<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminLoginController extends Controller
{
    public function index() {
        return view('AdminControl.login');
    }

    public function login(Request $request) {
        $account = $request->post('account');
        $password = $request->post('password');
        $res = DB::select('select * from admin where account = :account and password = :password;', ['account'=>$account,'password'=>$password]);
        if ($res) {
            session_start();
            $_SESSION['account'] = $account;
            return redirect()->route('barbecue');
        }else{
            echo "<script>alert('用户名或密码错误！');window.location='admin/login';</script>";
        }
    }
    public function logout() {
        session_start();
        $_SESSION = [];
        return redirect('admin/login');
    }
}
