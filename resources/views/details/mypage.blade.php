@extends('layouts.default')

@section('title', $user->name . 'さんのページ')

@section('css-link')

@endsection

@section('side-bar-content')
    <div id="book-image" style="background-image : url({{ asset('/storage/' . $showitems->image_file) }})"></div>


@endsection

@section('main-content')

@endsection

@section('js-link')

@endsection
