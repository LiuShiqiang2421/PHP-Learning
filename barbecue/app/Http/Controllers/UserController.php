<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $username = $_POST['name'];
        $usersex = $_POST['sex'];
        $usertel = $_POST['tel'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $houseNumber = $_POST['houseNumber'];
        $result = DB::select('select * from user where user_tel = :user_tel;', ['user_tel' => $usertel]);
        if ($result) {
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            if ($usersex == '男') {
                $avatar = 'http://localhost/barbecue/public/libs/img/男.png';
            } else {
                $avatar = 'http://localhost/barbecue/public/libs/img/女.png';
            }
            try {
                DB::insert('insert into user (user_name, user_sex, user_tel, password, avatar, user_address,
                user_detailed_address) values(?, ?, ?, ?, ?, ?, ?)', [$username, $usersex, $usertel, $password, $avatar, $address, $houseNumber]);
                echo TRUE;
            } catch (\Exception $e) {
                echo FALSE;
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::table('user')->where(['user_id' => $id])->update([
                'user_name' => $request['name'],
                'user_sex' => $request['sex'],
                'user_address' => $request['address'],
                'user_detailed_address' => $request['houseNumber'],
            ]);
            echo json_encode(['status' => '成功'], JSON_UNESCAPED_UNICODE);;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
