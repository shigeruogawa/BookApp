<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookFormRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $items = DB::table('books')->simplePaginate((10));
        $user = Auth::user();

        return view('bookindex', ['items' => $items, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function toInsert()
    {
        return view('details.createnewbook');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookid = $id;
        $showitems = Book::where('id', $bookid)->first();

        return view('details.showbook', ['showitems' => $showitems]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookid = $id;
        $edititems = Book::where('id', $bookid)->first();

        return view('details.editbook', ['edititems' => $edititems]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $target = Book::find($id);
        $form = $request->all();
        unset($form['_token']);

        $target->fill($form)->save();

        return redirect('/MyBook/book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $target = Book::find($id);
        $target->delete();

        return redirect('/MyBook/book');
    }

    public function ses_get(Request $request)
    {
        $sesdata = $request->session()->get('msg');

        return view('session', ['session_data' => $sesdata]);
    }

    public function ses_put(Request $request)
    {
        $msg = $request->input;
        $request->session()->put('msg', $msg);

        return redirect('MyBook/session');
    }
}
