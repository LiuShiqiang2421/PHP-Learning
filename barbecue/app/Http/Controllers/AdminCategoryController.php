<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCategoryController extends Controller
{
    public function upload_image()
    {
        $file_name = $_FILES["cate_pic"]["name"];            //文件名称
        $temp_file = $_FILES["cate_pic"]["tmp_name"];        //临时文件
        $file_size = $_FILES["cate_pic"]["size"];            //文件大小
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
        return view('Layout.Category.index');
    }

    public function update()
    {
        return view('Layout.Category.update_index');
    }

    public function update_control(Request $request)
    {
        $file_name = $_FILES["cate_pic"]["name"];
        $cate_name = $request["cate_name"];
        $cate_pic = $request["pic"];
        if ($cate_name) {
            if ($file_name) {
                $this->upload_image();
            }
            try {
                DB::table('category')->where(['cate_id' => $request['cate_id']])->update([
                    'cate_name' => $cate_name,
                    'cate_pic' => $file_name == '' ? $cate_pic : 'http://localhost/barbecue/public/libs/img/' . $file_name,
                ]);
                return "<script>alert('更新成功！');</script>" . redirect()->route('admin.category.index');
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        } else {
            echo "<script>alert('请填写类别名称！');window.history.go(-1);</script>";
        }
    }

    public function insert()
    {
        return view('Layout.Category.insert_index');
    }

    public function insert_control(Request $request)
    {
        $file_name = $_FILES["cate_pic"]["name"];
        $cate_id = $request['cate_id'];
        $cate_name = $request["cate_name"];
        if ($cate_id && $cate_name && $file_name) {
            $this->upload_image();
            try {
                DB::table('category')->insert([
                    'cate_id' => $cate_id,
                    'cate_name' => $cate_name,
                    'cate_pic' => 'http://localhost/barbecue/public/libs/img/' . $file_name]);
                return "<script>alert('新增成功！');</script>" . redirect()->route('admin.category.index');
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        } else {
            echo "<script>alert('请将信息填写完整！');window.history.go(-1);</script>";
        }
    }

    public function delete_control(Request $request)
    {
        $cate_id = $request->get("cate_id");
        try {
            DB::delete('delete from category where cate_id = :cate_id;', ['cate_id' => $cate_id]);
            return "<script>alert('删除成功！');</script>" . redirect()->route('admin.category.index');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
