@extends('layouts.default')

@section('title', $user->name . 'さんのページ')

@section('css-link')
    <link href="{{ asset('/css/mypage.css') }}" rel="stylesheet">
@endsection

@section('side-bar-content')
    <div id="image" style="background-image : url({{ asset('/storage/' . $user->image_file) }})"></div>

@endsection

@section('main-content')
    <p><i class="bi bi-person-square"></i></p>
    <p id="name">名前 : {{ $user->name }}</p>


@endsection

@section('js-link')

@endsection
