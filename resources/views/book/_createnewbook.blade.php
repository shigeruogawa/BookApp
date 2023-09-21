@extends('layouts.default')

@section('title', '新しい本')

@section('css-link')
    <link href="{{ asset('/css/createnewbook.css') }}" rel="stylesheet">
@endsection

@section('side-bar-content')
    <form action="/MyBook/book/insert" method="POST" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <th>タイトル : </th>
                <td><input type="text" name="title" value="{{ old('title') }}"></td>
            </tr>
            @error('title')
                <p class="err">{{ $message }}</p>
            @enderror
            <tr>
                <th>著者 : </th>
                <td><input type="textarea" name="author" value="{{ old('author') }}"></td>
            </tr>
            @error('author')
                <p class="err">{{ $message }}</p>
            @enderror
            <tr>
                <th>あらすじ : </th>
                <td><input type="textarea" name="synopsis" value="{{ old('synopsis') }}"></td>
            </tr>

            @error('synopsis')
                <p class="err">{{ $message }}</p>
            @enderror
            <tr>
                <th>感想 : </th>
                <td><input type="textarea" name="impressions" value="{{ old('impressions') }}"></td>
            </tr>

            @error('impressions')
                <p class="err">{{ $message }}</p>
            @enderror
            <tr>
                <th>表紙 : </th>
                <td><input type="file" name="image" id="image-form">
                    <label for="image-form" id="image-upload-form-label">
                        <p><i class="bi bi-plus-lg"></i>表紙画像をアップロード</p>
                    </label>
                </td>
            </tr>

            @error('image')
                <p class="err">{{ $message }}</p>
            @enderror
        </table>
        <button type="POST" class="btn btn-light">Send!</button>
    </form>
@endsection
