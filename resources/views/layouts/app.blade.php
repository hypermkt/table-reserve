<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/css/app.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/css/all.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">TableReserve</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        @if (Auth::check())
            <a class="p-2 text-dark" href="/table_types">席タイプ設定</a>
            <a class="p-2 text-dark" href="/courses">コース設定</a>
            <a class="p-2 text-dark" href="/stocks">在庫管理</a>
            {{--<a href="/{{ Auth::user()->name }}" target="_blank">予約ページを開く</a>--}}
            <a class="btn btn-outline-primary" href="/auth/twitter/logout">Logout</a>
        @else
            <a class="btn btn-outline-primary" href="/auth/twitter">Twitter Login</a>
        @endif
    </nav>
</div>

<div class="container">
@yield('content')
</div>

<div class="container">
    <footer class="pt-4 my-md-5 pt-md-5 border-top">
    </footer>
</div>

<script src="/js/app.js"></script>
</body>
</html>