<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminMealController extends Controller
{
    public function upload_image()
    {
        $file_name = $_FILES["meal_pic"]["name"];            //文件名称
        $temp_file = $_FILES["meal_pic"]["tmp_name"];        //临时文件
        $file_size = $_FILES["meal_pic"]["size"];            //文件大小
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
        return view('Layout.Meal.index');
    }

    public function update()
    {
        return view('Layout.Meal.update_index');
    }

    public function update_control(Request $request)
    {
        $file_name = $_FILES["meal_pic"]["name"];
        $meal_name = $request["meal_name"];
        $meal_info = $request["meal_info"];
        $meal_price = $request["meal_price"];
        $meal_category = $request["meal_category"];
        $meal_pic = $request["pic"];
        if ($meal_name && $meal_info && $meal_price && $meal_category) {
            if ($file_name) {
                $this->upload_image();
            }
            try {
                DB::table('meal')->where(['meal_id' => $request['meal_id']])->update([
                    'meal_name' => $meal_name,
                    'meal_info' => $meal_info,
                    'meal_price' => $meal_price,
                    'meal_category' => $meal_category,
                    'meal_pic' => $file_name == '' ? $meal_pic : 'http://localhost/barbecue/public/libs/img/' . $file_name,
                ]);
                return "<script>alert('更新成功！');</script>" . redirect()->route('admin.meal.index');
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        } else {
            echo "<script>alert('请填写类别名称！');window.history.go(-1);</script>";
        }
    }

    public function insert()
    {
        return view('Layout.Meal.insert_index');
    }

    public function insert_control(Request $request)
    {
        $file_name = $_FILES["meal_pic"]["name"];
        $meal_name = $request["meal_name"];
        $meal_info = $request["meal_info"];
        $meal_price = $request["meal_price"];
        $meal_category = $request["meal_category"];
        if ($meal_name && $meal_info && $meal_price && $meal_category && $file_name) {
            $this->upload_image();
            try {
                DB::table('meal')->insert([
                    'meal_name' => $meal_name,
                    'meal_info' => $meal_info,
                    'meal_price' => $meal_price,
                    'meal_category' => $meal_category,
                    'meal_pic' => 'http://localhost/barbecue/public/libs/img/' . $file_name]);
                return "<script>alert('新增成功！');</script>" . redirect()->route('admin.meal.index');
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        } else {
            echo "<script>alert('请将信息填写完整！');window.history.go(-1);</script>";
        }
    }

    public function delete_control(Request $request)
    {
        $meal_id = $request["meal_id"];
        try {
            DB::delete('delete from meal where meal_id = :meal_id;', ['meal_id' => $meal_id]);
            return "<script>alert('删除成功！');</script>" . redirect()->route('admin.meal.index');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
