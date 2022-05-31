<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUserController extends Controller
{
    public function upload_image()
    {
        $file_name = $_FILES["avatar"]["name"];            //文件名称
        $temp_file = $_FILES["avatar"]["tmp_name"];        //临时文件
        $file_size = $_FILES["avatar"]["size"];            //文件大小
        $file_type = ["jpg", "jpeg", "png", "gif"];      //允许上传的文件类型
        $suffix = explode('.', $file_name)[1];  //文件后缀名
        if (!in_array($suffix, $file_type)) {            //in_array() => 检查数组中是否存在某个值
            echo "<script>alert('$suffix.文件类型不符合要求！');window.history.go(-1);</script>";
            exit();
        } else if ($file_size < 1024 * 1024 * 2) {
            move_uploaded_file($temp_file, 'D:\xampp\htdocs\barbecue\public\libs\img\\' . $file_name);
        } else {
            echo "<script>alert('文件过大！');window.history.go(-1);</script>";
            exit();
        }
    }

    public function index()
    {
        return view('Layout.User.index');
    }

    public function update()
    {
        return view('Layout.User.update_index');
    }

    public function update_control(Request $request)
    {
        $file_name = $_FILES["avatar"]["name"];
        $user_name = $request["user_name"];
        $user_sex = $request["user_sex"];
        $avatar = $request['pic'];
        $user_tel = $request["user_tel"];
        $password = $request["password"];
        $points = $request["points"];
        $coupon = $request["coupon"];
        $user_address = $request["user_address"];
        $user_detailed_address = $request["user_detailed_address"];
        if ($user_name && $user_tel && $user_sex && $password && $user_address && $user_detailed_address && $points && $coupon) {
            if ($file_name) {
                $this->upload_image();
            }
            try {
                DB::table('user')->where(['user_id' => $request['user_id']])->update([
                    'user_name' => $user_name,
                    'user_tel' => $user_tel,
                    'user_sex' => $user_sex,
                    'password' => $password,
                    'user_address' => $user_address,
                    'user_detailed_address' => $user_detailed_address,
                    'points' => $points,
                    'coupon' => $coupon,
                    'avatar' => $file_name == '' ? $avatar : 'http://localhost/barbecue/public/libs/img/' . $file_name,
                ]);
                return "<script>alert('更新成功！');</script>" . redirect()->route('admin.user.index');
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        } else {
            echo "<script>alert('请将信息填写完整！');window.history.go(-1);</script>";
        }
    }

    public function insert()
    {
        return view('Layout.User.insert_index');
    }

    public function insert_control(Request $request)
    {
        $user_name = $request["user_name"];
        $user_sex = $request["user_sex"];
        $user_tel = $request["user_tel"];
        $password = $request["password"];
        $confirm_password = $request["confirm_password"];
        $user_address = $request["user_address"];
        $user_detailed_address = $request["user_detailed_address"];

        if ($user_name && $user_sex && $user_tel && $password && $confirm_password && $user_address && $user_detailed_address) {
            if (preg_match("/^[1][3-9][0-9]{9}$/", $user_tel)) {
                if ($password == $confirm_password) {
                    try {
                        DB::table('user')->insert([
                            'user_name' => $user_name,
                            'user_sex' => $user_sex,
                            'user_tel' => $user_tel,
                            'password' => $password,
                            'avatar' => $user_sex == '男' ? 'http://localhost/barbecue/public/libs/img/男.png' : 'http://localhost/barbecue/public/libs/img/女.png',
                            'user_address' => $user_address,
                            'user_detailed_address' => $user_detailed_address,
                        ]);
                        return "<script>alert('新增成功！');</script>" . redirect()->route('admin.user.index');
                    } catch (\Exception $e) {
                        echo $e->getMessage();
                    }
                } else {
                    echo "<script>alert('两次密码不一致！');window.history.go(-1);</script>";
                }
            } else {
                echo "<script>alert('电话号码不合法！');window.history.go(-1);</script>";
            }
        } else {
            echo "<script>alert('请将信息填写完整！');window.history.go(-1);</script>";
        }

    }

    public function delete_control(Request $request)
    {
        $user_id = $request->get("user_id");
        try {
            DB::delete('delete from user where user_id = :user_id;', ['user_id' => $user_id]);
            return "<script>alert('删除成功！');</script>" . redirect()->route('admin.user.index');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
