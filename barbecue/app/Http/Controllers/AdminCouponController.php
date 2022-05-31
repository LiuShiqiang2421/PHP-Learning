<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCouponController extends Controller
{
    public function upload_image()
    {
        $file_name = $_FILES["c_img"]["name"];            //文件名称
        $temp_file = $_FILES["c_img"]["tmp_name"];        //临时文件
        $file_size = $_FILES["c_img"]["size"];            //文件大小
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
        return view('Layout.Coupon.index');
    }

    public function update()
    {
        return view('Layout.Coupon.update_index');
    }

    public function update_control(Request $request)
    {
        $file_name = $_FILES["c_img"]["name"];
        $c_money = $request["c_money"];
        $c_points = $request["c_points"];
        $pic = $request["pic"];
        if ($c_money && $c_points) {
            if ($file_name) {
                $this->upload_image();
            }
            try {
                DB::table('coupon')->where(['c_id' => $request['c_id']])->update([
                    'c_money' => $c_money,
                    'c_points' => $c_points,
                    'c_img' => $file_name == '' ? $pic : 'http://localhost/barbecue/public/libs/img/' . $file_name,
                ]);
                return "<script>alert('更新成功！');</script>" . redirect()->route('admin.coupon.index');
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        } else {
            echo "<script>alert('请将信息填写完整！');window.history.go(-1);</script>";
        }
    }

    public function insert()
    {
        return view('Layout.Coupon.insert_index');
    }

    public function insert_control(Request $request)
    {
        $file_name = $_FILES["c_img"]["name"];
        $c_money = $request["c_money"];
        $c_points = $request["c_points"];
        if ($c_money && $c_points && $file_name) {
            $this->upload_image();
            try {
                DB::table('coupon')->insert([
                    'c_money' => $c_money,
                    'c_points' => $c_points,
                    'c_img' => 'http://localhost/barbecue/public/libs/img/' . $file_name]);
                return "<script>alert('新增成功！');</script>" . redirect()->route('admin.coupon.index');
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        } else {
            echo "<script>alert('请将信息填写完整！');window.history.go(-1);</script>";
        }
    }

    public function delete_control(Request $request)
    {
        $c_id = $request->get("c_id");
        try {
            DB::delete('delete from coupon where c_id = :c_id;', ['c_id' => $c_id]);
            return "<script>alert('删除成功！');</script>" . redirect()->route('admin.coupon.index');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
