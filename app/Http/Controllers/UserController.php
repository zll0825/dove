<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){
        return view('ucenter.index');
    }

    public function myauction(){
        return view('ucenter.myauction');
    }

    public function myorder(){
        return view('ucenter.myorder');
    }

    public function mymsg(){
        return view('ucenter.mymsg');
    }
}
