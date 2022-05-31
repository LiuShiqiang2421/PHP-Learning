<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
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
        $password = $_POST['password'];

        $isUser = DB::select('select * from user where user_tel = :tel;', ['tel'=>$tel]);
        if ($isUser) { // 说明该电话号码在用户表中
            $resPassword = DB::select('select password from user where user_tel = :tel;', ['tel'=>$tel]);
            if ($resPassword[0]->password == $password) { // json 对象的属性访问
                echo json_encode($isUser, JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode(['status'=>'密码错误'], JSON_UNESCAPED_UNICODE);
            }
        } else { // 该用户还未注册
            echo json_encode(['status'=>'尚未注册'], JSON_UNESCAPED_UNICODE);;
        }
    }
}
