<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function toMypage()
    {
        $user = Auth::user();

        return view('user.mypage', ['user' => $user]);
    }

    public function toRegisterProfile($id)
    {
        $user = Auth::user();

        return view('user.registerprofile', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);

        $user = Auth::User()->find($form['id']);

        if (isset($form['image_file'])) {
            $image = $request->file('image_file');
            $imageName = time() . '.' . $image->getClientOriginalName();
            $image->storeAs('public/image/user', $imageName);
            $form['image_file'] = 'image/user/' . $imageName;
        }

        $user->fill($form)->save();

        return redirect('/MyBook/mypage/' . $form['id']);
    }
}
