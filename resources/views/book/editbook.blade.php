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

    <form method="POST" action="/MyBook/book/update">
        @csrf
        <input type="hidden" name="id" value="{{ $edititems->id }}">
        <p>あらすじ</p>
        <textarea name="synopsis" id="synopsis-area">{{ $sysnopsisText }}</textarea>
        @error('synopsis')
            <p class="err">{{ $message }}</p>
        @enderror
        <p>感想</p>
        <textarea name="impressions" id="impressions-area">{{ $impressionsText }}</textarea>
        @error('impressions')
            <p class="err">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-light" style="margin-top:5px">Send!</button>
    </form>
@endsection

@section('js-link')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
