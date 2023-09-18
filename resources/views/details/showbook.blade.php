@extends('layouts.default')

@section('title', $showitems->title)

@section('css-link')
    <link href="{{ asset('/css/showbook.css') }}" rel="stylesheet">
@endsection

@section('side-bar-content')
<div id="book-image" style="background-image : url({{ asset('/storage/' . $showitems->image_file) }})"></div>
@endsection

@section('main-content')
    <h2 id="title">{{ $showitems->title }}</h2>

    <p>あらすじ</p>
    <p id="synopsis-area">{{ $showitems->synopsis }}</p>

    <p>感想</p>
    <p id="impressions-area">{{ $showitems->impressions }}</p>

    <button type="button"  class="btn btn-light"><a href="/MyBook/book/{{ $showitems->id }}/edit"><i class="bi bi-pen"></i></a></button>
@endsection

@section('js-link')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
