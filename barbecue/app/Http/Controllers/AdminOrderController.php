<?php

namespace App\Http\Controllers;

class AdminOrderController extends Controller
{
    public function index()
    {
        return view('Layout.Order.index');
    }
}
