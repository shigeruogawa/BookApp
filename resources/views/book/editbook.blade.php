@extends('layouts.default')

@section('title', $edititems->title)

@section('css-link')
    <link href="{{ asset('/css/editbook.css') }}" rel="stylesheet">
@endsection

@section('side-bar-content')
    <div id="book-image" style="background-image : url({{ asset('/storage/' . $edititems->image_file) }})"></div>
@endsection

@section('main-content')
    <h2 id="title">{{ $edititems->title }}</h2>

    <form method="post" action="/MyBook/book/{{ $edititems->id }}">
        @csrf
        <p>あらすじ</p>
        <textarea name="synopsis" id="synopsis-area">{{ $edititems->synopsis }}</textarea>

        <p>感想</p>
        <textarea name="impressions" id="impressions-area">{{ $edititems->impressions }}</textarea>

        <div><button type="submit" class="btn btn-light" style="margin-top:5px">Send!</button></div>
    </form>
@endsection

@section('js-link')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
