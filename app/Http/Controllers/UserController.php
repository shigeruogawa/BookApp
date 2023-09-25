<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * ユーザー情報の表示、更新を行うコントローラ
 *
 * @author ogawa.shigeru1@gmail.com
 * @package App\Http\Controllers
 */
class UserController extends Controller
{

    /**
     * ログインしているユーザー情報の表示
     *
     * @return \Illuminate\View\View ログインしているユーザーのマイページへ遷移
     */
    public function toMypage()
    {
        $user = Auth::user();

        return view('user.mypage', ['user' => $user]);
    }

    /**
     * ユーザープロフィールの更新画面を表示
     *
     * @param int $id ユーザーID
     * @return \Illuminate\View\View ユーザープロフィールの更新画面へ遷移
     */
    public function toRegisterProfile($id)
    {
        $user = Auth::user();

        return view('user.registerprofile', ['user' => $user]);
    }

    /**
     * ユーザープロフィールの更新
     *
     * @param \Illuminate\Http\Request $request プロフィール更新フォームから送信されたデータ
     * @return \Illuminate\Http\RedirectResponse ログインしているユーザーのマイページへ遷移
     */
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
