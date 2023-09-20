@extends('layouts.default')

@section('title', $user->name . 'さんのページ')

@section('css-link')
    <link href="{{ asset('/css/mypage.css') }}" rel="stylesheet">
@endsection

@section('side-bar-content')
    <div id="image" style="background-image : url({{ asset('/storage/' . $user->image_file) }})"></div>
@endsection


@section('main-content')
    <div class="row">
        <p><i class="bi bi-person-square"></i></p>
        <p><a href="/MyBook/mypage/{{ $user->id }}/edit"><i class="bi bi-pencil-square"></i><span>プロフィール編集</span></a></p>
    </div>
    <p id="name">名前 : {{ $user->name }}</p>
    <p>メイルアドレス : {{ $user->email }}</p>
    <p>出身地 : {{ $user->birthplace }}</p>
    <p>誕生日 : {{ $user->birth }}</p>
    <p>好きな作家は？ : {{ $user->favoauthor }}</p>
    <p>お気に入りの作品は？ : {{ $user->favowork }}</p>
    @endsection @section('js-link') @endsection
