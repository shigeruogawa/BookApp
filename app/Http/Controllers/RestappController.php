<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookFormRequest;
use App\Models\Restdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RestappController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Restdata::all();
        $items = DB::table('restdata')->simplePaginate((10));




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

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalName();
        $image->storeAs('public/image', $imageName);

        $newbook = new Restdata;
        $form = $request->all();

        $form['image_file'] = 'image/' . $imageName;
        unset($form['_token']);

        $newbook->fill($form)->save();

        return redirect('/MyBook');
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
        $showitems = Restdata::where('id', $bookid)->first();

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
        $edititems = Restdata::where('id', $bookid)->first();

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
        $target = Restdata::find($id);
        $form = $request->all();
        unset($form['_token']);
        $target->fill($form)->save();
        return redirect('/MyBook');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $target = Restdata::find($id);
        $target->delete();
        return redirect('/MyBook');
    }

    public function toMypage()
    {
        return view('details.mypage');
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
