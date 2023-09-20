@extends('layouts.default')

@section('title', '一覧')

@section('css-link')
    <link href="{{ asset('/css/bookindex.css') }}" rel="stylesheet">
@endsection

@section('side-bar-content')
    <div>
        <p>{{ $user->name . 'さんこんにちは' }}</p>
        <form action="/logout" method="POST">
            @csrf
            <button>ログアウト</button>
        </form>
    </div>
    <div id="sideboard">
        <div id="person">
            <img id="portrait">
        </div>
        <ul>
            <li>好きな作家: </li>
            <li>お気に入りの作品: </li>
        </ul>
        <p id="self-intro"></p>
    </div>
@endsection

@section('main-content')
    <table>
        <th id="cover-head"></th>
        <th id="title-head" class="title"><i class="bi bi-flag"></i>
            <p>TITLE</p>
        </th>
        <th id="author-head" class="author"><i class="bi bi-pen"></i>
            <p>AUTHOR</p>
        </th>
        <th id="ymd-head" class="ymd"><i class="bi bi-calendar-check"></i>
            <p>DATE</p>
        </th>
        <th id="rel-button-head"></th>
        <th id="del-button-head"></th>

        @foreach ($items as $val)
            <tr>
                <td class="book-image" style="background-image : url({{ asset('/storage/' . $val->image_file) }})">
                <td id="title-val" class="title">{{ $val->title }}</td>
                <td id="author-val" class="author">{{ $val->author }}</td>
                <td id="ymd-val" class="ymd">{{ date('Y-m-d', strtotime($val->updated_at)) }}</td>
                <td class="ref-button"><a href="/MyBook/book/{{ $val->id }}"><i class="bi bi-book"
                            style="color: black;"></i></a></td>
                <td class="del-button">
                    <form method="post" action="/MyBook/book/{{ $val->id }}/" id="delete-form">
                        @method('DELETE')
                        @csrf
                        <button id="del-button-logo" onclick="return confirm('削除してよろしいでしょうか？')">
                            <i class="bi bi-trash3-fill" style="{font-color:black;}"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <button type="button" class="btn btn-light" style="color: black;margin-top: 25px;">
        <a href="/MyBook/book/toInsert">
            <i class="bi bi-plus"></i>
            NEW BOOK
        </a>
    </button>
@endsection

@section('js-link')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bookindex.js') }}"></script>
@endsection
