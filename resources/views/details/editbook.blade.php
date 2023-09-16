@extends('layouts.default-show')
@section('head')
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/index.css') }}" rel="stylesheet">
@endsection

@section('title', $edititems->title)

@section('book-title')
    <h2 id="title">{{ $edititems->title }}</h2>
@endsection

@section('synopsis')
    <form method="post" action="/MyBook/{{ $edititems->id }}">
        @csrf
        <p>あらすじ</p>
        <p id="synopsis-area">
            <textarea name="synopsis">{{ $edititems->synopsis }}</textarea>
        </p>
    @endsection

    @section('impressions')
        <p>感想</p>
        <p id="impressions-area">
            <textarea name="impressions">{{ $edititems->impressions }}</textarea>
        </p>
    @endsection

    @section('action-button')
        {{-- <button type="button" class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-pen-fill" viewBox="0 0 16 16">
                <path
                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
            </svg></button> --}}
        <input type="submit" value="送信">
    </form>
@endsection
