<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function toMypage()
    {
        $user = Auth::user();

        return view('details.mypage', ['user' => $user]);
    }

    public function toRegisterProfile()
    {
        $user = Auth::user();

        return view('details.user.registerprofile', ['user' => $user]);


    }
}
