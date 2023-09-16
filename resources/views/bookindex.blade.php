<html>

<head>
    <link href="{{ asset('/css/bookindex.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>
        このミステリがすごい
    </title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Shadows+Into+Light&family=Water+Brush&family=Yuji+Mai&display=swap');
    </style>
</head>
<header>
    <h1>THE BEST MISTERIES</h1>
</header>

<body>


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
    </div>

    <table>
        <th id="cover-head"></th>
        <th id="title-head" class="title"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
                <path
                    d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001" />
            </svg>
            <p>TITLE</p>
        </th>
        <th id="author-head" class="author"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path
                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
            </svg>
            <p>AUTHOR</p>
        </th>
        <th id="ymd-head" class="ymd"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-calendar" viewBox="0 0 16 16">
                <path
                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
            </svg>
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
                <td class="ref-button"><a href="/MyBook/{{ $val->id }}"><svg xmlns="http://www.w3.org/2000/svg"
                            width="40" height="35" fill="c#8B4513" class="bi bi-book-half" viewBox="0 0 16 16">
                            <path
                                d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                        </svg></a></td>
                <td class="del-button">
                    <form method="post" action="/MyBook/{{ $val->id }}/">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-info" onclick="return confirm('削除してよろしいでしょうか？')"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-trash3"
                                viewBox="0 0 16 16">
                                <path
                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $items->links() }}
    <button type="button" class="btn btn-info"><a href="/MyBook/toInsert">NEW BOOK</a></button>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bookindex.js') }}"></script>
</body>

</html>
