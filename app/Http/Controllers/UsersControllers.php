<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersControllers extends Controller
{
    public function cartShow()
    {
        if (Auth::check())
        {
        $email = Auth::user()['email'];
            $orders = DB::table('orders')->where('userEmail', '=', $email)->get();
            //$res = explode(',',$orders);
            //var_dump(json_decode(json_encode($orders),true));
            return view('users/UsersPage', ['orders'=>json_decode(json_encode($orders),true)]);
        }



       // return view('users/UsersPage', ['orders'=>$orders]);

    }
}
