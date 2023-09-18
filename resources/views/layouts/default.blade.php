<html>

<head>
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('/css/default.css') }}" rel="stylesheet">
    @yield('css-link')
</head>

<body>
    <div id="header" class="container-fluid">
        <div class="row">
            <div id="to-index" class="col-2">
                <a href="/MyBook/book" height="120px">
                    <img src="{{ asset('/storage/image/Books.png') }}" height="120px" />
                </a>
            </div>
            <div id="to-mypage" class="col-10">
                <a href="/MyBook/mypage/1" id="mypage-link">
                    <i class="bi bi-house-door" style="font-size: 120px"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div id="side-bar" class="col-3">
                @yield('side-bar-content')
        </div>

        <div id="main-content" class="col-9">
            @yield('main-content')
        </div>
    </div>
    @yield('js-link')
</body>

</html>
