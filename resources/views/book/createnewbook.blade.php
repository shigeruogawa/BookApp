@extends('layouts.default')

@section('title', '新しい本')

@section('css-link')
    <link href="{{ asset('/css/createnewbook.css') }}" rel="stylesheet">
@endsection

<form action="/MyBook/book/insert" method="POST" enctype="multipart/form-data">
    @section('side-bar-content')
        <div id="image-upload">
            <i class="bi bi-book" id="image-logo"></i>
            <img id="image-area" alt="No image" style="display: none;">
        </div>

        <input type="file" id="image-upload-form" name="image" value="">
        <label for="image-upload-form" id="image-upload-form-label">
            <p id="image-upload-form-button"><i class="bi bi-plus"></i>表紙画像をアップロード</p>
        </label>

        @error('image')
            <p class="err">{{ $message }}</p>
        @enderror
    @endsection

    @section('main-content')
        <p>タイトル : <input type="text" name="title" value="{{ old('title') }}"></p>
        @error('title')
            <p class="err">{{ $message }}</p>
        @enderror
        <p>著者 : <input type="text" name="author" value="{{ old('author') }}"></p>
        @error('author')
            <p class="err">{{ $message }}</p>
        @enderror
        <p>あらすじ :
            <textarea name="synopsis">{{ $synopsisText }}</textarea>
        </p>
        @error('synopsis')
            <p class="err">{{ $message }}</p>
        @enderror
        <p>感想 :
            <textarea name="impressions">{{ $impressionsText }}</textarea>
        </p>
        @error('impressions')
            <p class="err">{{ $message }}</p>
        @enderror

        @csrf
        <button type="POST" class="btn btn-light">Send!</button>
    </form>
@endsection

@section('js-link')
    <script src="{{ asset('/js/createnewbook.js') }}"></script>
@endsection
