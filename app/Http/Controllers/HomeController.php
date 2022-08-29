<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{

    public function __construct() ///Finction น้ใช้ในการกรองข้อมูลก่อนเข้าสู่ระบบ  Controller ใหนมีจะต้องผ่่านการกรองก่อน
    //สามารถทำได้ที่ Route หรือ Controller ก็ได้

    {
        $this->middleware('auth');
        // return view('home');
    }
    public function index()
    {

        return view('home');
    }
}
