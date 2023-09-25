<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookFormRequest;
use App\Http\Requests\BookUpdateRequest;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * 本の情報の表示、挿入、更新、削除を行うコントローラー
 *
 * @author ogawa.shigeru1@gmail.com
 * @package App\Http\Controllers
 */
class BookController extends Controller
{
    /**
     * 本の一覧画面を表示
     *
     * @return \Illuminate\View\View 本の一覧画面へ遷移。10件ごとにページング
     */
    public function index()
    {
        $items = DB::table('books')->simplePaginate((10));
        $user = Auth::user();

        return view('book.bookindex', ['items' => $items, 'user' => $user]);
    }

    /**
     * 本の新規登録画面を表示
     *
     * @return \Illuminate\View\View 本の新規登録画面へ遷移
     */
    public function toInsert()
    {

        $synopsisText = old('synopsis');
        if (!isset($synopsisText)) {
            $synopsisText = 'あらすじを入力!(200文字以内)';
        }

        $impressionsText = old('impressions');
        if (!isset($impressionsText)) {
            $impressionsText = '感想を入力!(200文字以内)';
        }

        return view('book.createnewbook', ['synopsisText' => $synopsisText, 'impressionsText' => $impressionsText]);
    }

    /**
     * 本の新規登録用に送信されてきたデータを保存
     *
     * @param  \Illuminate\Http\Request  $request 投稿フォームから送信されたデフォームフォーム
     * @return \Illuminate\Http\RedirectResponse 本の一覧画面へ遷移
     */
    public function store(BookFormRequest $request)
    {
        $newbook = new Book;

        $form = $request->all();
        unset($form['_token']);

        if (isset($form['image'])) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalName();
            $image->storeAs('public/image', $imageName);
            $form['image_file'] = 'image/' . $imageName;
        }

        $newbook->fill($form)->save();
        return redirect('/MyBook/book');
    }

    /**
     * 本の詳細画面を表示
     *
     * @param  int  $id 本のID
     * @return \Illuminate\View\View 本の詳細画面へ遷移
     */
    public function show($id)
    {
        $bookid = $id;
        $showitems = Book::where('id', $bookid)->first();

        return view('book.showbook', ['showitems' => $showitems]);
    }

    /**
     * 本の編集画面を表示
     *
     * @param  int  $id 編集対象の本のID
     * @return \Illuminate\View\View 本の編集画面へ遷移
     */
    public function edit($id)
    {
        $bookid = $id;
        $edititems = Book::where('id', $bookid)->first();

        $sysnopsisText = old('synopsis');
        if (!isset($sysnopsisText)) {
            $sysnopsisText = '【あらすじを更新!(200文字以内)】 ↓' . "\n" . "\n" . $edititems->synopsis;
        }

        $impressionsText = old('impressions');
        if (!isset($impressionsText)) {
            $impressionsText = '【感想を更新!(200文字以内)】 ↓' . "\n" . "\n" . $edititems->impressions;
        }
        return view('book.editbook', ['edititems' => $edititems, 'sysnopsisText' => $sysnopsisText, 'impressionsText' => $impressionsText]);
    }

    /**
     * 本の情報を更新
     *
     * @param  \Illuminate\Http\Request  $request 編集フォールから送信されたデータ
     * @return \Illuminate\Http\RedirectResponse 本の一覧画面へ遷移
     */
    public function update(BookUpdateRequest $request)
    {
        $target = Book::find($request->id);
        $form = $request->all();
        unset($form['_token']);

        $target->fill($form)->save();

        return redirect('/MyBook/book');
    }

    /**
     * 本の情報を削除
     *
     * @param  int  $id 削除対象の本のID
     * @return \Illuminate\Http\RedirectResponse 本の一覧画面へ遷移
     */
    public function destroy($id)
    {
        $target = Book::find($id);
        $target->delete();

        return redirect('/MyBook/book');
    }
}
