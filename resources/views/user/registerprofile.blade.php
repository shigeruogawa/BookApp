@extends('layouts.default')

@section('title', $user->name . 'さんのページ')

@section('css-link')
    <link href="{{ asset('/css/registerprofile.css') }}" rel="stylesheet">
@endsection

<form method="POST" action="/MyBook/mypage/profile/update" enctype="multipart/form-data">
    @section('side-bar-content')
        <div id="image-upload">
            <i class="bi bi-person-bounding-box" id="image-logo"></i>
            <img id="image-area" alt="No image" style="display: none;">
        </div>

        <input type="file" id="image-upload-form" name="image_file" value="">
        {{-- <div id="image-upload-form-link"> --}}
        <label for="image-upload-form" id="image-upload-form-label">
            <p id="image-upload-form-button"><i class="bi bi-plus"></i>プロフィール画像をアップロード</p>
        </label>
        {{-- </div> --}}

    @endsection
    @section('main-content') <input type="hidden" name="id" value="{{ $user->id }}">
        <p>お名前 : <input type="text" name="name" value="{{ $user->name }}" readonly disabled></p>
        <p>メイルアドレス : <input type="email" name="email" value="{{ $user->email }}"></p>
        <p>出身地 : <input type="text" name="birthplace" value="{{ $user->birthplace }}"></p>
        <p>誕生日 : <input type="date" name="birth" value="{{ $user->birth }}"></p>
        <p>好きな作家は？ : <input type="text" name="favoauthor" value="{{ $user->favoauthor }}"></p>
        <p>お気に入りの作品は？ : <input type="text" name="favowork" value="{{ $user->favowork }}"></p>
        @csrf
        <button type="POST" class="btn btn-light">Send!</button>
    </form>
@endsection

@section('js-link')
    <script src="{{ asset('/js/registerprofile.js') }}"></script>
@endsection
